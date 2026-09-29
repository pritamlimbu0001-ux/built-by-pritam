<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('sort_order')->orderBy('id')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.create', ['project' => new Project(['published' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            // Stored in storage/app/public/projects — run: php artisan storage:link
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validated($request, $project);

        if ($request->hasFile('image')) {
            // Replace old image so unused files do not remain.
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('status', 'Project deleted.');
    }

    public function togglePublished(Project $project): RedirectResponse
    {
        $project->update(['published' => ! $project->published]);

        return back()->with('status', $project->published ? 'Project published.' : 'Project unpublished.');
    }

    public function toggleFeatured(Project $project): RedirectResponse
    {
        $project->update(['featured' => ! $project->featured]);

        return back()->with('status', $project->featured ? 'Project marked as featured.' : 'Project unfeatured.');
    }

    private function validated(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['required', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($project)],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description'       => ['required', 'string'],
            'technologies'      => ['nullable', 'string', 'max:255'],
            'github_url'        => ['nullable', 'url', 'max:255'],
            'live_url'          => ['nullable', 'url', 'max:255'],
            'image'             => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'], // 2 MB
            'featured'          => ['nullable', 'boolean'],
            'published'         => ['nullable', 'boolean'],
            'sort_order'        => ['nullable', 'integer'],
        ]) + [
            // Unchecked checkboxes send nothing — normalize to false.
            'featured'  => $request->boolean('featured'),
            'published' => $request->boolean('published'),
            'sort_order' => $request->input('sort_order', 0),
        ];
    }
}
