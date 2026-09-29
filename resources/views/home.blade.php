@extends('layouts.app')

@section('title', 'Pritam Limbu — Computer Engineering Student & Web Developer')

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.skills')
    @include('sections.projects')
    @include('sections.resume')
    @include('sections.contact')
@endsection
