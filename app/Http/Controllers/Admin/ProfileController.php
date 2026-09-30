<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private function profile(): Profile
    {
        return Profile::first() ?? new Profile([
            'name' => 'Pritam Limbu',
        ]);
    }

    public function edit(): View
    {
        return view('admin.profile.edit', [
            'profile' => $this->profile(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'headline' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location' => [
                'nullable',
                'string',
                'max:100',
            ],

            'short_about' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'about' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'profile_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $profile = $this->profile();

        /*
        |--------------------------------------------------------------------------
        | Upload profile image to Cloudinary
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            try {

                $uploadApi = new UploadApi();

                $result = $uploadApi->upload(
                    $request->file('profile_image')->getRealPath(),
                    [
                        'folder' => 'profile',
                    ]
                );

                if (! isset($result['secure_url'])) {
                    return back()
                        ->withInput()
                        ->withErrors([
                            'profile_image' =>
                                'Cloudinary uploaded the image but did not return a secure URL.',
                        ]);
                }

                $data['profile_image'] = $result['secure_url'];

            } catch (\Throwable $e) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'profile_image' =>
                            'Cloudinary error: ' . $e->getMessage(),
                    ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Save profile
        |--------------------------------------------------------------------------
        */

        if ($profile->exists) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return redirect()
            ->route('admin.profile.edit')
            ->with('status', 'Profile updated successfully.');
    }
}