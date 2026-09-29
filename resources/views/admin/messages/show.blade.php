@extends('admin.layout')

@section('title', 'View Message')
@section('page-title', 'View Message')

@section('content')
    <div class="admin-panel admin-message">
        <div class="admin-message__head">
            <div>
                <h2>{{ $message->subject ?: '(no subject)' }}</h2>
                <p class="muted">
                    From <strong>{{ $message->name }}</strong> &lt;{{ $message->email }}&gt;
                    · {{ $message->created_at->format('M j, Y \a\t g:i A') }}
                    @if ($message->read_at)
                        · <span class="badge badge--gray">Read {{ $message->read_at->diffForHumans() }}</span>
                    @else
                        · <span class="badge badge--green">Unread</span>
                    @endif
                </p>
            </div>
            <div class="admin-message__actions">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn--primary btn--sm">Reply by Email</a>
            </div>
        </div>

        <div class="admin-message__body">{{ $message->message }}</div>

        <div class="admin-form-actions">
            @if ($message->read_at)
                <form method="POST" action="{{ route('admin.messages.unread', $message) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn--ghost">Mark as Unread</button>
                </form>
            @else
                <form method="POST" action="{{ route('admin.messages.read', $message) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn--ghost">Mark as Read</button>
                </form>
            @endif

            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                  onsubmit="return confirm('Delete this message permanently?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn--danger">Delete</button>
            </form>

            <a href="{{ route('admin.messages.index') }}" class="btn btn--ghost">Back to Messages</a>
        </div>
    </div>
@endsection
