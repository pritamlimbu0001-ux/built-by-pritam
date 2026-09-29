@extends('admin.layout')

@section('title', 'Skills')
@section('page-title', 'Skills')

@section('content')
    <div class="admin-toolbar">
        <a href="{{ route('admin.skills.create') }}" class="btn btn--primary btn--sm">+ Add Skill</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Level</th>
                    <th>Order</th>
                    <th class="admin-table__actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                    <tr>
                        <td><strong>{{ $skill->name }}</strong></td>
                        <td><span class="badge badge--gray">{{ $skill->category }}</span></td>
                        <td>
                            @if ($skill->level > 0)
                                <div class="level-bar"><span style="width: {{ $skill->level }}%"></span></div>
                                <span class="muted admin-mono">{{ $skill->level }}%</span>
                            @else
                                <span class="muted">—</span>
                            @endif
                        </td>
                        <td>{{ $skill->sort_order }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn--ghost btn--xs">Edit</a>
                            <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="admin-inline-form"
                                  onsubmit="return confirm('Delete this skill?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">No skills yet. Click "Add Skill" to create one.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $skills->links('pagination::simple-default') }}
@endsection
