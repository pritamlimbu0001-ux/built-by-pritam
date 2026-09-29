<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — Pritam Limbu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

@php
    $navItems = [
        ['label' => 'Dashboard',    'route' => 'admin.dashboard',          'icon' => '<rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>'],
        ['label' => 'Projects',     'route' => 'admin.projects.index',     'icon' => '<path d="M3 9l9-6 9 6v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>'],
        ['label' => 'Skills',       'route' => 'admin.skills.index',       'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>'],
        ['label' => 'Messages',     'route' => 'admin.messages.index',     'icon' => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>'],
        ['label' => 'Profile',      'route' => 'admin.profile.edit',       'icon' => '<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/>'],
        ['label' => 'Resume',       'route' => 'admin.resume.index',       'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>'],
        ['label' => 'Social Links', 'route' => 'admin.social-links.index', 'icon' => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.6" y1="10.5" x2="15.4" y2="6.5"/><line x1="8.6" y1="13.5" x2="15.4" y2="17.5"/>'],
    ];
@endphp

<div class="admin-layout">

    {{-- ============ SIDEBAR ============ --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar__brand">
            <span class="nav__brand-mark">&lt;/&gt;</span>
            <span class="admin-sidebar__brand-text">Admin<span class="accent">Panel</span></span>
        </a>

        <nav class="admin-sidebar__nav" aria-label="Admin navigation">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="admin-nav-link {{ request()->routeIs(str_replace('.index', '.*', $item['route'])) || request()->routeIs($item['route']) ? 'is-active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $item['icon'] !!}</svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="admin-sidebar__footer">
            <div class="admin-sidebar__user">
                <span class="admin-sidebar__user-name">{{ Auth::user()->name }}</span>
                <span class="admin-sidebar__user-email">{{ Auth::user()->email }}</span>
            </div>
            <a href="{{ route('admin.logout') }}" class="admin-nav-link admin-nav-link--danger">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
            </a>
        </div>
    </aside>

    <div class="admin-sidebar__backdrop" id="adminBackdrop" hidden></div>

    {{-- ============ MAIN ============ --}}
    <div class="admin-main">
        <header class="admin-topbar">
            <button class="admin-topbar__toggle" id="adminSidebarToggle" aria-label="Toggle sidebar" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
            <h1 class="admin-topbar__title">@yield('page-title', 'Dashboard')</h1>
            <a href="{{ route('home') }}" class="admin-topbar__view-site" target="_blank" rel="noopener">
                View Site
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>
        </header>

        <main class="admin-content">
            @if (session('status'))
                <div class="admin-alert admin-alert--ok" role="status">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    (function () {
        var sidebar = document.getElementById('adminSidebar');
        var toggle = document.getElementById('adminSidebarToggle');
        var backdrop = document.getElementById('adminBackdrop');

        function setOpen(open) {
            sidebar.classList.toggle('is-open', open);
            backdrop.hidden = !open;
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        }

        toggle.addEventListener('click', function () {
            setOpen(!sidebar.classList.contains('is-open'));
        });
        backdrop.addEventListener('click', function () { setOpen(false); });
    })();
</script>
</body>
</html>
