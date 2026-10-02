@extends('admin.layout')

@section('title', 'View Message')
@section('page-title', 'View Message')

@section('content')
    <div class="admin-panel admin-message">

        {{-- =====================================================
             MESSAGE HEADER
        ====================================================== --}}
        <div class="admin-message__head">

            <div>
                <h2>
                    {{ $message->subject ?: '(no subject)' }}
                </h2>

                <p class="muted">
                    From
                    <strong>{{ $message->name }}</strong>
                    &lt;{{ $message->email }}&gt;

                    · {{ $message->created_at->format('M j, Y \a\t g:i A') }}

                    @if ($message->read_at)
                        ·
                        <span class="badge badge--gray">
                            Read {{ $message->read_at->diffForHumans() }}
                        </span>
                    @else
                        ·
                        <span class="badge badge--green">
                            Unread
                        </span>
                    @endif
                </p>
            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}
            <div class="admin-message__actions">

                {{-- Open Gmail Compose --}}
                <a
                    href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($message->email) }}&su={{ urlencode('Re: ' . ($message->subject ?: '(no subject)')) }}"
                    class="btn btn--primary btn--sm"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Reply by Gmail
                </a>

            </div>

        </div>


        {{-- =====================================================
             MESSAGE BODY
        ====================================================== --}}
        <div class="admin-message__body">
            {{ $message->message }}
        </div>


        {{-- =====================================================
             MESSAGE ACTIONS
        ====================================================== --}}
        <div class="admin-form-actions">

            {{-- Mark as Unread / Read --}}
            @if ($message->read_at)

                <form
                    method="POST"
                    action="{{ route('admin.messages.unread', $message) }}"
                >
                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="btn btn--ghost"
                    >
                        Mark as Unread
                    </button>
                </form>

            @else

                <form
                    method="POST"
                    action="{{ route('admin.messages.read', $message) }}"
                >
                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="btn btn--ghost"
                    >
                        Mark as Read
                    </button>
                </form>

            @endif


            {{-- Delete --}}
            <form
                method="POST"
                action="{{ route('admin.messages.destroy', $message) }}"
                onsubmit="return confirm('Delete this message permanently?');"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn--danger"
                >
                    Delete
                </button>
            </form>


            {{-- Back --}}
            <a
                href="{{ route('admin.messages.index') }}"
                class="btn btn--ghost"
            >
                Back to Messages
            </a>

        </div>

    </div>
@endsection