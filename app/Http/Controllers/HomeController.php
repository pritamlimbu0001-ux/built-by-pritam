<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function __invoke()
    {
        $projects = Project::published()->ordered()->get();
        $featuredProject = $projects->firstWhere('featured', true) ?? $projects->first();

        return view('home', [
            'projects'        => $projects,
            'featuredProject' => $featuredProject,
            'otherProjects'   => $projects->where('id', '!=', optional($featuredProject)->id)->values(),
            'skills'          => Skill::ordered()->get()->groupBy('category'),
            'profile'         => Profile::first(),
            'socialLinks'     => SocialLink::active()->ordered()->get(),
            'resumeAvailable' => optional(Resume::latest()->first())->fileExists() ?? false,
        ]);
    }
}
