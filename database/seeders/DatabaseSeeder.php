<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- Profile: exactly what the static site already said ---
        Profile::firstOrCreate(
            ['name' => 'Pritam Limbu'],
            [
                'headline' => 'Computer Engineering Student & Web Developer',
                'location' => 'Nepal',
                'short_about' => "I'm a Computer Engineering student from Nepal, focused on building practical web applications with Laravel, PHP and MySQL. I enjoy turning ideas into working, real-world software — like my futsal booking system.",
                'about' => "I'm Pritam Limbu, a Computer Engineering student based in Nepal. Alongside my studies, I develop practical skills in modern web development — designing and building applications that solve everyday problems.\n\nMy main stack is Laravel, PHP and MySQL, with HTML, CSS, JavaScript and Tailwind CSS on the frontend. My favourite way to learn is by shipping real projects — most recently, an online futsal booking system.\n\nI'm still early in my journey, and I'm committed to improving one project at a time. I'm looking for opportunities to grow as a developer and contribute to meaningful work.",
            ]
        );

        // --- Skills: exactly the ones from the original static site ---
        $skills = [
            ['name' => 'HTML',          'category' => 'Frontend', 'sort_order' => 1],
            ['name' => 'CSS',           'category' => 'Frontend', 'sort_order' => 2],
            ['name' => 'JavaScript',    'category' => 'Frontend', 'sort_order' => 3],
            ['name' => 'Tailwind CSS',  'category' => 'Frontend', 'sort_order' => 4],
            ['name' => 'PHP',           'category' => 'Backend',  'sort_order' => 5],
            ['name' => 'Laravel',       'category' => 'Backend',  'sort_order' => 6],
            ['name' => 'MySQL',         'category' => 'Database', 'sort_order' => 7],
            ['name' => 'Git',           'category' => 'Tools',    'sort_order' => 8],
            ['name' => 'GitHub',        'category' => 'Tools',    'sort_order' => 9],
            ['name' => 'VS Code',       'category' => 'Tools',    'sort_order' => 10],
        ];
        foreach ($skills as $skill) {
            Skill::firstOrCreate(
                ['name' => $skill['name']],
                ['category' => $skill['category'], 'level' => 0, 'sort_order' => $skill['sort_order']]
            );
        }

        // --- Featured project: the real one ---
        Project::firstOrCreate(
            ['slug' => 'saptashree-futsal'],
            [
                'title' => 'Saptashree Futsal — Online Booking System',
                'short_description' => 'A modern futsal booking website built with Laravel, PHP and MySQL.',
                'description' => "A modern futsal booking website built with Laravel, PHP and MySQL.\n\nCustomers can view futsal information, pick a date and time slot, and manage their bookings online.\n\nKey features:\n- Browse futsal information and available slots\n- Date & time slot selection for bookings\n- Booking management for customers",
                'technologies' => 'Laravel,PHP,MySQL,Blade',
                'github_url' => null, // PLACEHOLDER: set the real repo URL in the admin panel
                'live_url' => null,   // PLACEHOLDER: set the real demo URL in the admin panel
                'featured' => true,
                'published' => true,
                'sort_order' => 1,
            ]
        );

        // --- Social link: the real GitHub URL provided ---
        SocialLink::firstOrCreate(
            ['platform' => 'GitHub'],
            [
                'url' => 'https://github.com/pritamlimbu0001-ux',
                'icon' => 'github',
                'sort_order' => 1,
                'active' => true,
            ]
        );

        // --- Resume: import the existing PDF into secure storage ---
        if (Resume::count() === 0) {
            $legacy = public_path('cv/pritam-limbu-cv.pdf');

            if (file_exists($legacy)) {
                $path = 'cv/pritam-limbu-cv.pdf';
                Storage::disk('local')->put($path, file_get_contents($legacy));

                Resume::create([
                    'file_path' => $path,
                    'original_name' => 'Pritam-Limbu-CV.pdf',
                ]);
            }
        }
    }
}
