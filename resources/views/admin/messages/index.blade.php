@extends('admin.layout')

@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>From</th>
                    <th>Subject / Preview</th>
                    <th>Received</th>
                    <th class="admin-table__actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr class="{{ $message->read_at ? '' : 'admin-table__row--unread' }}">
                        <td>
                            @if ($message->read_at)
                                <span class="badge badge--gray">Read</span>
                            @else
                                <span class="badge badge--green">Unread</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $message->name }}</strong><br>
                            <span class="muted admin-mono">{{ $message->email }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message) }}" class="admin-link">
                                {{ $message->subject ?: '(no subject)' }}
                            </a><br>
                            <span class="muted">{{ Str::limit($message->message, 60) }}</span>
                        </td>
                        <td class="muted nowrap">{{ $message->created_at->diffForHumans() }}</td>
                        <td class="admin-table__actions">
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn--ghost btn--xs">Open</a>

                            @if ($message->read_at)
                                <form method="POST" action="{{ route('admin.messages.unread', $message) }}" class="admin-inline-form">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn--ghost btn--xs">Mark unread</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.messages.read', $message) }}" class="admin-inline-form">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn--ghost btn--xs">Mark read</button>
                                </form>
                            @endif

                            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="admin-inline-form"
                                  onsubmit="return confirm('Delete this message permanently?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $messages->links('pagination::simple-default') }}
@endsection
