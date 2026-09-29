@csrf

<div class="admin-form-grid">
    <div class="form-field">
        <label for="platform">Platform <span class="req">*</span></label>
        <input type="text" id="platform" name="platform" value="{{ old('platform', $link->platform) }}" required maxlength="50" placeholder="GitHub, LinkedIn, ...">
        @error('platform')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="url">URL <span class="req">*</span></label>
        <input type="url" id="url" name="url" value="{{ old('url', $link->url) }}" required maxlength="255" placeholder="https://...">
        @error('url')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="sort_order">Display order <span class="muted">(integer)</span></label>
        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $link->sort_order ?? 0) }}">
        @error('sort_order')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="admin-checks">
        <label class="admin-check">
            <input type="checkbox" name="active" value="1" {{ old('active', $link->active) ? 'checked' : '' }}>
            Active <span class="muted">(shown on the public site)</span>
        </label>
    </div>
</div>

<div class="admin-form-actions">
    <button type="submit" class="btn btn--primary">{{ $submitLabel }}</button>
    <a href="{{ route('admin.social-links.index') }}" class="btn btn--ghost">Cancel</a>
</div>
