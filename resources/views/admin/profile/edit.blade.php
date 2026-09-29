@extends('admin.layout')

@section('title', 'Profile')
@section('page-title', 'Profile')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="form-field">
                    <label for="name">Name <span class="req">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $profile->name) }}" required maxlength="100">
                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-field">
                    <label for="headline">Headline <span class="muted">(e.g. Computer Engineering Student & Web Developer)</span></label>
                    <input type="text" id="headline" name="headline" value="{{ old('headline', $profile->headline) }}" maxlength="255">
                    @error('headline')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-field">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $profile->location) }}" maxlength="100">
                    @error('location')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-field">
                    <label for="profile_image">Profile image <span class="muted">(optional — jpg, png, webp, max 2 MB)</span></label>
                    <input type="file" id="profile_image" name="profile_image" accept="image/jpeg,image/png,image/webp">
                    @error('profile_image')<span class="form-error">{{ $message }}</span>@enderror
                    @if ($profile->profile_image)
                        <div class="admin-current-file">
                            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Current profile image" class="thumb thumb--round">
                            <span class="muted">Current image — uploading a new one replaces it.</span>
                        </div>
                    @endif
                </div>

                <div class="form-field admin-form-grid__wide">
                    <label for="short_about">Short intro <span class="muted">(shown in the Hero section)</span></label>
                    <textarea id="short_about" name="short_about" rows="4" maxlength="1000">{{ old('short_about', $profile->short_about) }}</textarea>
                    @error('short_about')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-field admin-form-grid__wide">
                    <label for="about">Full about text <span class="muted">(shown in the About section — blank lines become paragraphs)</span></label>
                    <textarea id="about" name="about" rows="8" maxlength="5000">{{ old('about', $profile->about) }}</textarea>
                    @error('about')<span class="form-error">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="btn btn--primary">Save Profile</button>
            </div>
        </form>
    </div>
@endsection
