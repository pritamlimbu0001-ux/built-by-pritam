@extends('admin.layout')

@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')
    <div class="admin-toolbar">
        <a href="{{ route('admin.projects.create') }}" class="btn btn--primary btn--sm">+ Add Project</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th class="admin-table__actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="" class="thumb">
                            @else
                                <span class="muted">—</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $project->title }}</strong><br>
                            <span class="muted admin-mono">{{ $project->slug }}</span>
                        </td>
                        <td>
                            @if ($project->published)
                                <span class="badge badge--green">Published</span>
                            @else
                                <span class="badge badge--gray">Draft</span>
                            @endif
                            @if ($project->featured)
                                <span class="badge badge--gold">Featured</span>
                            @endif
                        </td>
                        <td>{{ $project->sort_order }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn--ghost btn--xs">Edit</a>

                            <form method="POST" action="{{ route('admin.projects.toggle-published', $project) }}" class="admin-inline-form">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn btn--ghost btn--xs">{{ $project->published ? 'Unpublish' : 'Publish' }}</button>
                            </form>

                            <form method="POST" action="{{ route('admin.projects.toggle-featured', $project) }}" class="admin-inline-form">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn btn--ghost btn--xs">{{ $project->featured ? 'Unfeature' : 'Feature' }}</button>
                            </form>

                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="admin-inline-form"
                                  onsubmit="return confirm('Delete this project and its image? This cannot be undone.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">No projects yet. Click "Add Project" to create one.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $projects->links('pagination::simple-default') }}
@endsection
