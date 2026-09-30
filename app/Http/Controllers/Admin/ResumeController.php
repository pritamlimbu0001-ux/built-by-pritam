<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
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

            if (!isset($result['secure_url'])) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'cv' => 'Cloudinary uploaded the CV but did not return a secure URL.',
                    ]);
            }

            // Remove the previous database record.
            $oldResume = Resume::latest()->first();

            if ($oldResume) {
                $oldResume->delete();
            }

            // Store the Cloudinary URL in the database.
            Resume::create([
                'file_path' => $result['secure_url'],
                'original_name' => $validated['cv']->getClientOriginalName(),
            ]);

        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'cv' => 'Cloudinary error: ' . $e->getMessage(),
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
        // For now, remove only the database record.
        $resume->delete();

        return redirect()
            ->route('admin.resume.index')
            ->with('status', 'Resume deleted successfully.');
    }

    /**
     * Download the current resume.
     */
    public function download(Resume $resume): Response
    {
        abort_unless(
            $resume && $resume->file_path,
            404,
            'CV not found.'
        );

        try {
            // Retrieve the PDF from Cloudinary.
            $response = Http::timeout(30)->get($resume->file_path);

            abort_unless(
                $response->successful(),
                404,
                'CV file could not be retrieved from Cloudinary.'
            );

            // Force the browser to download the PDF.
            return response(
                $response->body(),
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' .
                        $resume->original_name .
                        '"',
                    'Content-Length' => strlen($response->body()),
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0',
                ]
            );

        } catch (\Throwable $e) {
            abort(
                404,
                'Unable to download the CV.'
            );
        }
    }
}