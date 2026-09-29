<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /** Single profile record — the panel manages the one and only row. */
    private function profile(): Profile
    {
        return Profile::first() ?? new Profile(['name' => 'Pritam Limbu']);
    }

    public function edit(): View
    {
        return view('admin.profile.edit', ['profile' => $this->profile()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'headline'      => ['nullable', 'string', 'max:255'],
            'location'      => ['nullable', 'string', 'max:100'],
            'short_about'   => ['nullable', 'string', 'max:1000'],
            'about'         => ['nullable', 'string', 'max:5000'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $profile = $this->profile();

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($profile->exists) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return redirect()->route('admin.profile.edit')
            ->with('status', 'Profile updated.');
    }
}
