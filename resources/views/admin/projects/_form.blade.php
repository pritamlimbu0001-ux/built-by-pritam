@csrf

<div class="admin-form-grid">
    <div class="form-field">
        <label for="title">Title <span class="req">*</span></label>
        <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required maxlength="255">
        @error('title')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="slug">Slug <span class="req">*</span></label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}" required maxlength="255" placeholder="my-project">
        @error('slug')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field admin-form-grid__wide">
        <label for="short_description">Short description <span class="muted">(optional)</span></label>
        <input type="text" id="short_description" name="short_description" value="{{ old('short_description', $project->short_description) }}" maxlength="255">
        @error('short_description')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field admin-form-grid__wide">
        <label for="description">Description <span class="req">*</span></label>
        <textarea id="description" name="description" rows="6" required>{{ old('description', $project->description) }}</textarea>
        @error('description')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="technologies">Technologies <span class="muted">(comma-separated)</span></label>
        <input type="text" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies) }}" placeholder="Laravel, PHP, MySQL">
        @error('technologies')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="sort_order">Display order <span class="muted">(integer)</span></label>
        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}">
        @error('sort_order')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="github_url">GitHub URL <span class="muted">(optional)</span></label>
        <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/...">
        @error('github_url')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="live_url">Live URL <span class="muted">(optional)</span></label>
        <input type="url" id="live_url" name="live_url" value="{{ old('live_url', $project->live_url) }}" placeholder="https://...">
        @error('live_url')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field admin-form-grid__wide">
        <label for="image">Project image <span class="muted">(optional — jpg, png, webp, max 2 MB)</span></label>
        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp">
        @error('image')<span class="form-error">{{ $message }}</span>@enderror
        @if ($project->image)
            <div class="admin-current-file">
                <img src="{{ asset('storage/' . $project->image) }}" alt="Current project image" class="thumb">
                <span class="muted">Current image — uploading a new one replaces it.</span>
            </div>
        @endif
    </div>

    <div class="admin-checks">
        <label class="admin-check">
            <input type="checkbox" name="published" value="1" {{ old('published', $project->published) ? 'checked' : '' }}>
            Published <span class="muted">(visible on the public site)</span>
        </label>
        <label class="admin-check">
            <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
            Featured <span class="muted">(shown as the big project card)</span>
        </label>
    </div>
</div>

<div class="admin-form-actions">
    <button type="submit" class="btn btn--primary">{{ $submitLabel }}</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn--ghost">Cancel</a>
</div>
