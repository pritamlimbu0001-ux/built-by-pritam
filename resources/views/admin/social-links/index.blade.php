@extends('admin.layout')

@section('title', 'Social Links')
@section('page-title', 'Social Links')

@section('content')
    <div class="admin-toolbar">
        <a href="{{ route('admin.social-links.create') }}" class="btn btn--primary btn--sm">+ Add Link</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Platform</th>
                    <th>URL</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th class="admin-table__actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($links as $link)
                    <tr>
                        <td><strong>{{ $link->platform }}</strong></td>
                        <td><a href="{{ $link->url }}" target="_blank" rel="noopener" class="admin-link admin-mono">{{ $link->url }}</a></td>
                        <td>{{ $link->sort_order }}</td>
                        <td>
                            @if ($link->active)
                                <span class="badge badge--green">Active</span>
                            @else
                                <span class="badge badge--gray">Hidden</span>
                            @endif
                        </td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.social-links.edit', $link) }}" class="btn btn--ghost btn--xs">Edit</a>
                            <form method="POST" action="{{ route('admin.social-links.destroy', $link) }}" class="admin-inline-form"
                                  onsubmit="return confirm('Delete this social link?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">No social links yet. Click "Add Link" to create one.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
