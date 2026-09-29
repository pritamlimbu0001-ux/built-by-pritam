@extends('admin.layout')

@section('title', 'Add Skill')
@section('page-title', 'Add Skill')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.skills.store') }}">
            @include('admin.skills._form', ['submitLabel' => 'Add Skill'])
        </form>
    </div>
@endsection
