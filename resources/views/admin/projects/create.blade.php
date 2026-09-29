@extends('admin.layout')

@section('title', 'Add Project')
@section('page-title', 'Add Project')

@section('content')
    <div class="admin-panel admin-panel--form">
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @include('admin.projects._form', ['submitLabel' => 'Create Project'])
        </form>
    </div>
@endsection
