@extends('admin.layout')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.projects._form', ['submitLabel' => 'Save Changes'])
        </form>
    </div>
@endsection
