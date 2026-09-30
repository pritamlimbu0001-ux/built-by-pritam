<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ResumeController extends Controller
{
    /**
     * Download the latest CV from Cloudinary.
     */
    public function download(): Response
    {
        $resume = Resume::latest()->first();

        abort_unless(
            $resume && $resume->file_path,
            404,
            'CV not found.'
        );

        $response = Http::get($resume->file_path);

        abort_unless(
            $response->successful(),
            404,
            'CV file could not be retrieved.'
        );

        return response(
            $response->body(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $resume->original_name . '"',
                'Content-Length' => strlen($response->body()),
            ]
        );
    }
}