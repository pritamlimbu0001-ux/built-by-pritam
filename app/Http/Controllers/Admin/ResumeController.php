<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ResumeController extends Controller
{
    /**
     * Show the resume management page.
     */
    public function index(): View
    {
        $resume = Resume::latest()->first();

        return view('admin.resume.index', compact('resume'));
    }

    /**
     * Upload a new resume.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'resume' => [
                'required',
                'file',
                'mimes:pdf',
                'max:5120',
            ],
        ]);

        // Delete the previous resume if one exists.
        $oldResume = Resume::latest()->first();

        if ($oldResume) {
            if (
                $oldResume->file_path &&
                Storage::disk('local')->exists($oldResume->file_path)
            ) {
                Storage::disk('local')->delete($oldResume->file_path);
            }

            $oldResume->delete();
        }

        // Store the new resume.
        $file = $validated['resume'];

        $path = $file->store('resumes', 'local');

        Resume::create([
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
        ]);

        return redirect()
            ->route('admin.resume.index')
            ->with('status', 'Resume uploaded successfully.');
    }

    /**
     * Delete the current resume.
     */
    public function destroy(Resume $resume): RedirectResponse
    {
        if (
            $resume->file_path &&
            Storage::disk('local')->exists($resume->file_path)
        ) {
            Storage::disk('local')->delete($resume->file_path);
        }

        $resume->delete();

        return redirect()
            ->route('admin.resume.index')
            ->with('status', 'Resume deleted successfully.');
    }

    /**
     * Download the current resume.
     */
    public function download()
    {
        $resume = Resume::latest()->first();

        abort_unless(
            $resume && $resume->fileExists(),
            404,
            'CV not found.'
        );

        return Storage::disk('local')->download(
            $resume->file_path,
            $resume->original_name,
            [
                'Content-Type' => 'application/pdf',
            ]
        );
    }
}