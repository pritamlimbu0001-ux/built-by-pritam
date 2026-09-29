@csrf

<div class="admin-form-grid">
    <div class="form-field">
        <label for="name">Skill name <span class="req">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" required maxlength="100">
        @error('name')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="category">Category <span class="req">*</span></label>
        <select id="category" name="category" required>
            @foreach (App\Models\Skill::CATEGORIES as $category)
                <option value="{{ $category }}" {{ old('category', $skill->category) === $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        @error('category')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="level">Level <span class="muted">(0–100, optional)</span></label>
        <input type="number" id="level" name="level" value="{{ old('level', $skill->level ?? 0) }}" min="0" max="100">
        @error('level')<span class="form-error">{{ $message }}</span>@enderror
    </div>

    <div class="form-field">
        <label for="sort_order">Display order <span class="muted">(integer)</span></label>
        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $skill->sort_order ?? 0) }}">
        @error('sort_order')<span class="form-error">{{ $message }}</span>@enderror
    </div>
</div>

<div class="admin-form-actions">
    <button type="submit" class="btn btn--primary">{{ $submitLabel }}</button>
    <a href="{{ route('admin.skills.index') }}" class="btn btn--ghost">Cancel</a>
</div>
