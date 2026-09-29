@extends('admin.layout')

@section('title', 'Resume')
@section('page-title', 'Resume / CV')

@section('content')
    @if ($resume)
        <div class="admin-panel">
            <h2 class="admin-panel__title">Current CV</h2>
            <div class="admin-resume-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                <div>
                    <strong>{{ $resume->original_name }}</strong><br>
                    <span class="muted">
                        Uploaded {{ $resume->created_at->diffForHumans() }}
                        · {{ number_format(Storage::disk('local')->size($resume->file_path) / 1024) }} KB
                        · <span class="badge badge--green">Public download: ON</span>
                    </span>
                </div>
                <div class="admin-resume-card__actions">
                    <a href="{{ route('admin.resume.download', $resume) }}" class="btn btn--ghost btn--sm">Download</a>
                    <form method="POST" action="{{ route('admin.resume.destroy', $resume) }}"
                          onsubmit="return confirm('Delete the CV? The public Download CV button will disappear.');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn--danger btn--sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="admin-panel">
            <h2 class="admin-panel__title">No CV uploaded</h2>
            <p class="muted">The public "Download CV" button is hidden until you upload a file here.</p>
        </div>
    @endif

    <div class="admin-panel admin-panel--form">
        <h2 class="admin-panel__title">{{ $resume ? 'Replace CV' : 'Upload CV' }}</h2>
        <form method="POST" action="{{ route('admin.resume.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-field">
                <label for="cv">CV file <span class="muted">(pdf, doc, docx — max 5 MB)</span></label>
                <input type="file" id="cv" name="cv" required accept=".pdf,.doc,.docx">
                @error('cv')<span class="form-error">{{ $message }}</span>@enderror
            </div>
            <div class="admin-form-actions">
                <button type="submit" class="btn btn--primary">{{ $resume ? 'Replace CV' : 'Upload CV' }}</button>
            </div>
        </form>
    </div>
@endsection
