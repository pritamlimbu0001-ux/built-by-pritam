{{-- ================= PROJECTS (database-driven) ================= --}}
<section class="section" id="projects">
    <div class="container">
        <div class="section__head reveal">
            <span class="section__kicker">03 · Projects</span>
            <h2 class="section__title">Featured work</h2>
            <p class="section__sub">Real applications I've designed and built.</p>
        </div>

        @if ($featuredProject)
            <article class="project-feature reveal">
                <div class="project-feature__media">
                    @if ($featuredProject->image)
<img src="{{ $featuredProject->image }}" alt="{{ $featuredProject->title }} screenshot" class="project-feature__img">                    @else
                        <div class="screenshot-placeholder" role="img" aria-label="{{ $featuredProject->title }} screenshot placeholder">
                            <div class="screenshot-placeholder__bar"><span></span><span></span><span></span></div>
                            <div class="screenshot-placeholder__body">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                <p>Screenshot placeholder</p>
                                <span>Add a project image in the admin panel</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="project-feature__body">
                    <span class="project-feature__flag">Featured Project</span>
                    <h3 class="project-feature__title">{{ $featuredProject->title }}</h3>

                    @foreach (array_filter(preg_split("/\n{2,}/", $featuredProject->description)) as $paragraph)
                        <p class="project-feature__desc">{!! nl2br(e(trim($paragraph))) !!}</p>
                    @endforeach

                    @if ($featuredProject->technologies)
                        <ul class="tag-list">
                            @foreach ($featuredProject->technologies_array as $tech)
                                <li class="tag">{{ $tech }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="project-feature__links">
                        @if ($featuredProject->live_url)
                            <a href="{{ $featuredProject->live_url }}" target="_blank" rel="noopener" class="btn btn--primary btn--sm">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                Live Demo
                            </a>
                        @endif
                        @if ($featuredProject->github_url)
                            <a href="{{ $featuredProject->github_url }}" target="_blank" rel="noopener" class="btn btn--ghost btn--sm">
                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.28-.01-1.02-.02-2-3.2.7-3.88-1.54-3.88-1.54-.53-1.33-1.28-1.69-1.28-1.69-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.09-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.8 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.83 1.19 3.09 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .31.21.68.8.56A10.52 10.52 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                                GitHub
                            </a>
                        @endif
                        @unless ($featuredProject->live_url || $featuredProject->github_url)
                            <span class="muted" style="font-size:.85rem">Links coming soon</span>
                        @endunless
                    </div>
                </div>
            </article>
        @endif

        <div class="projects__grid">
            @foreach ($otherProjects as $project)
                <article class="project-card reveal">
                    @if ($project->image)
<img src="{{ $project->image }}" alt="{{ $project->title }}" class="project-card__img">                    @else
                        <div class="project-card__placeholder" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                    @endif
                    <div class="project-card__body">
                        <h3>{{ $project->title }}</h3>
                        <p class="muted">{{ $project->short_description ?: Str::limit($project->description, 100) }}</p>
                        @if ($project->technologies)
                            <ul class="tag-list">
                                @foreach ($project->technologies_array as $tech)
                                    <li class="tag">{{ $tech }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="project-feature__links">
                            @if ($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="btn btn--primary btn--sm">Live Demo</a>
                            @endif
                            @if ($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn btn--ghost btn--sm">GitHub</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach

            {{-- Keep the "Coming Soon" placeholders when fewer than 2 extra projects exist --}}
            @for ($i = $otherProjects->count(); $i < 2; $i++)
                <article class="project-card project-card--soon reveal">
                    <div class="project-card__soon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <h3>Coming Soon</h3>
                        <p>The next project is on its way. Check back soon.</p>
                    </div>
                </article>
            @endfor
        </div>
    </div>
</section>
