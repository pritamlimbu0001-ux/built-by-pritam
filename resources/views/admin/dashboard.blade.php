@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    @php
        $cards = [
            ['label' => 'Total Projects',     'value' => $stats['total_projects'],     'icon' => '<path d="M3 9l9-6 9 6v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>'],
            ['label' => 'Published Projects', 'value' => $stats['published_projects'], 'icon' => '<polyline points="20 6 9 17 4 12"/>'],
            ['label' => 'Total Skills',       'value' => $stats['total_skills'],       'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>'],
            ['label' => 'Total Messages',     'value' => $stats['total_messages'],     'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
            ['label' => 'Unread Messages',    'value' => $stats['unread_messages'],    'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'],
        ];
    @endphp

    <div class="stat-grid">
        @foreach ($cards as $card)
            <article class="stat-card">
                <span class="stat-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $card['icon'] !!}</svg>
                </span>
                <div class="stat-card__body">
                    <span class="stat-card__value">{{ $card['value'] }}</span>
                    <span class="stat-card__label">{{ $card['label'] }}</span>
                </div>
            </article>
        @endforeach

        <article class="stat-card {{ $stats['resume_available'] ? 'stat-card--ok' : 'stat-card--warn' }}">
            <span class="stat-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </span>
            <div class="stat-card__body">
                <span class="stat-card__value">{{ $stats['resume_available'] ? 'Available' : 'Missing' }}</span>
                <span class="stat-card__label">Resume Status</span>
            </div>
        </article>
    </div>

    <div class="admin-panel">
        <h2 class="admin-panel__title">Welcome back, {{ Auth::user()->name }} 👋</h2>
        <p class="muted">
            This is your portfolio control center. Project, skill, message and profile
            management will appear in the sidebar as the next phases are built.
        </p>
    </div>
@endsection
