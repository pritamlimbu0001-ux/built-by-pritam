{{-- ================= HERO ================= --}}
<section class="hero section" id="home">
    <div class="hero__glow hero__glow--1" aria-hidden="true"></div>
    <div class="hero__glow hero__glow--2" aria-hidden="true"></div>

    <div class="container hero__inner">
        <div class="hero__content reveal">
            <p class="hero__eyebrow"><span class="status-dot" aria-hidden="true"></span> Open to opportunities</p>
            <h1 class="hero__title">
                Hi, I'm <span class="accent">{{ $profile->name ?? 'Pritam Limbu' }}</span>
            </h1>
            <h2 class="hero__subtitle">{!! nl2br(e($profile->headline ?? 'Computer Engineering Student & Web Developer')) !!}</h2>
            <p class="hero__text">{!! nl2br(e($profile->short_about ?? '')) !!}</p>

            <div class="hero__cta">
                <a href="#projects" class="btn btn--primary">
                    View My Projects
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                @if ($resumeAvailable)
                    <a href="{{ route('cv.download') }}" class="btn btn--ghost" title="Download CV (PDF)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Download CV
                    </a>
                @endif
                <a href="#contact" class="btn btn--text">Contact Me</a>
            </div>

            <div class="hero__meta">
                @if ($profile->location ?? null)
                    <span class="hero__meta-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ $profile->location }}
                    </span>
                @endif
                <span class="hero__meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    Laravel · PHP · MySQL
                </span>
            </div>
        </div>

        <div class="hero__visual reveal reveal--delay">
            <div class="profile-card" role="img" aria-label="Profile photo of {{ $profile->name ?? 'Pritam Limbu' }}">
                @if ($profile->profile_image ?? null)
                    <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="{{ $profile->name }}" class="profile-card__photo">
                @else
                    <div class="profile-card__avatar">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/>
                        </svg>
                    </div>
                @endif
                <div class="profile-card__label">
                    <span class="profile-card__name">{{ $profile->name ?? 'Pritam Limbu' }}</span>
                    <span class="profile-card__role">Web Developer</span>
                </div>
                @unless ($profile->profile_image ?? null)
                    <span class="profile-card__badge">Photo placeholder</span>
                @endunless
            </div>
        </div>
    </div>

    <a href="#about" class="hero__scroll" aria-label="Scroll to about section">
        <span class="hero__scroll-mouse"><span></span></span>
        Scroll
    </a>
</section>
