<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'cv' => [
                'required',
                'file',
                'mimes:pdf',
                'max:5120',
            ],
        ]);

        try {
            $uploadApi = new UploadApi();

            $result = $uploadApi->upload(
                $validated['cv']->getRealPath(),
                [
                    'folder' => 'resumes',
                    'resource_type' => 'raw',
                ]
            );

            if (! isset($result['secure_url'])) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'cv' =>
                            'Cloudinary uploaded the CV but did not return a secure URL.',
                    ]);
            }

            // Remove the previous database record.
            $oldResume = Resume::latest()->first();

            if ($oldResume) {
                $oldResume->delete();
            }

            // Store the Cloudinary URL in file_path.
            Resume::create([
                'file_path' => $result['secure_url'],
                'original_name' => $validated['cv']->getClientOriginalName(),
            ]);

        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'cv' =>
                        'Cloudinary error: ' . $e->getMessage(),
                ]);
        }

        return redirect()
            ->route('admin.resume.index')
            ->with('status', 'Resume uploaded successfully.');
    }

    /**
     * Delete the current resume.
     */
    public function destroy(Resume $resume): RedirectResponse
    {
        // The CV file itself is stored on Cloudinary.
        // For now we remove its database record.
        $resume->delete();

        return redirect()
            ->route('admin.resume.index')
            ->with('status', 'Resume deleted successfully.');
    }

    /**
     * Download the current resume.
     */
    public function download(Resume $resume): RedirectResponse
    {
        abort_unless(
            $resume && $resume->file_path,
            404,
            'CV not found.'
        );

        return redirect()->away($resume->file_path);
    }
}