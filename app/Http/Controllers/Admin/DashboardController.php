<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $resume = Resume::latest()->first();

        return view('admin.dashboard', [
            'stats' => [
                'total_projects'     => Project::count(),
                'published_projects' => Project::where('published', true)->count(),
                'total_skills'       => Skill::count(),
                'total_messages'     => ContactMessage::count(),
                'unread_messages'    => ContactMessage::whereNull('read_at')->count(),
                'resume_available'   => $resume && $resume->fileExists(),
            ],
        ]);
    }
}
