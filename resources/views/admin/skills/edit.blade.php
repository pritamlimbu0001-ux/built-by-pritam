@extends('admin.layout')

@section('title', 'Edit Skill')
@section('page-title', 'Edit Skill')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
            @method('PUT')
            @include('admin.skills._form', ['submitLabel' => 'Save Changes'])
        </form>
    </div>
@endsection
