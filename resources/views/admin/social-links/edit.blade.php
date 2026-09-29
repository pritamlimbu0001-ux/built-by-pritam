@extends('admin.layout')

@section('title', 'Edit Social Link')
@section('page-title', 'Edit Social Link')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.social-links.update', $link) }}">
            @method('PUT')
            @include('admin.social-links._form', ['submitLabel' => 'Save Changes'])
        </form>
    </div>
@endsection
