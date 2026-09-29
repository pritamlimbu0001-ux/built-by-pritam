<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create the administrator account (prompts for credentials, never hardcoded)';

    public function handle(): int
    {
        $this->info('Create an administrator account');
        $this->newLine();

        $name = $this->ask('Name');
        $email = $this->ask('Email');

        if (! $name || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('A valid name and email are required.');

            return self::FAILURE;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('A user with this email already exists.');

            return self::FAILURE;
        }

        $password = $this->secret('Password (min 8 characters)');
        $confirm = $this->secret('Confirm password');

        if ($password !== $confirm) {
            $this->error('Passwords do not match.');

            return self::FAILURE;
        }

        $validator = validator(['password' => $password], [
            'password' => [Password::min(8)],
        ]);

        if ($validator->fails()) {
            $this->error('Password must be at least 8 characters.');

            return self::FAILURE;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info("Admin account '{$email}' created successfully.");

        return self::SUCCESS;
    }
}
