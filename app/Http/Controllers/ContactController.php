<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     *
     * 1. Validates the input.
     * 2. Stores the message in the `contact_messages` table.
     * 3. Emails a notification to the site owner (MAIL_TO_ADDRESS in .env).
     *
     * If the database is unavailable, the message is still emailed and
     * logged — visitors never see an error, and nothing is lost.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $stored = false;

        try {
            $contactMessage = ContactMessage::create($validated);
            $stored = true;
        } catch (\Throwable $e) {
            Log::error('Contact message could not be stored: '.$e->getMessage());
            $contactMessage = new ContactMessage($validated);
        }

        // Always keep a copy in the log, even if DB and mail both fail.
        Log::info('Portfolio contact message', $validated);

        try {
            Mail::to(config('mail.to_address', config('mail.from.address')))
                ->send(new ContactMessageMail($contactMessage));
        } catch (\Throwable $e) {
            Log::warning('Contact email failed to send: '.$e->getMessage());
        }

        return back()
            ->with('status', 'Message sent - thank you! I will get back to you soon.');
    }
}
