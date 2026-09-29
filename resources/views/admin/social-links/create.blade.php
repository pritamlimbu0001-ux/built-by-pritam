@extends('admin.layout')

@section('title', 'Add Social Link')
@section('page-title', 'Add Social Link')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.social-links.store') }}">
            @include('admin.social-links._form', ['submitLabel' => 'Add Link'])
        </form>
    </div>
@endsection
