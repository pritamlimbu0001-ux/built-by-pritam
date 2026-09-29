{{-- ================= ABOUT ================= --}}
<section class="section" id="about">
    <div class="container">
        <div class="section__head reveal">
            <span class="section__kicker">01 · About</span>
            <h2 class="section__title">A bit about me</h2>
        </div>

        <div class="about__grid">
            <div class="about__text reveal">
                @if ($profile->about ?? null)
                    @foreach (array_filter(preg_split("/\n{2,}/", $profile->about)) as $paragraph)
                        <p>{!! nl2br(e(trim($paragraph))) !!}</p>
                    @endforeach
                @else
                    <p>I'm Pritam Limbu, a Computer Engineering student based in Nepal.
                    Alongside my studies, I develop practical skills in modern web
                    development — designing and building applications that solve
                    everyday problems.</p>
                @endif
            </div>

            <div class="about__card reveal reveal--delay">
                <h3 class="about__card-title">Quick facts</h3>
                <dl class="facts">
                    <div class="facts__row">
                        <dt>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                            Education
                        </dt>
                        <dd>Computer Engineering Student<br><span class="muted">{{ $profile->location ?? 'Nepal' }}</span></dd>
                    </div>
                    <div class="facts__row">
                        <dt>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.4 1 2.3h6c0-.9.4-1.8 1-2.3A7 7 0 0 0 12 2z"/></svg>
                            Interests
                        </dt>
                        <dd>Web development, databases &amp; building useful applications</dd>
                    </div>
                    <div class="facts__row">
                        <dt>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            Current focus
                        </dt>
                        <dd>Laravel · PHP · MySQL</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</section>
