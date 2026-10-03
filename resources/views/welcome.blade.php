
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO -->
    <title>Pritam Limbu — Computer Engineering Student & Software Developer</title>
    <meta
        name="description"
        content="Portfolio of Pritam Limbu, a Computer Engineering student from Nepal focused on Laravel, PHP, MySQL and modern web development."
    />
    <meta name="author" content="Pritam Limbu" />

    <meta property="og:title" content="Pritam Limbu — Web Developer Portfolio" />
    <meta
        property="og:description"
        content="Computer Engineering student building practical web applications with Laravel, PHP and MySQL."
    />
    <meta property="og:type" content="website" />

    <meta name="theme-color" content="#0b100e" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet"
    />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

    <!-- ============ NAVBAR ============ -->
    <header class="site-header" id="siteHeader">
        <nav class="nav container" aria-label="Main navigation">

            <a href="#home" class="nav__logo">
                <span class="nav__logo-bracket">&lt;</span>pritam<span class="nav__logo-accent">.</span>dev<span class="nav__logo-bracket">/&gt;</span>
            </a>

            <button
                class="nav__toggle"
                id="navToggle"
                aria-label="Toggle menu"
                aria-expanded="false"
                aria-controls="navMenu"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav__menu" id="navMenu">
                <li>
                    <a href="#home" class="nav__link is-active">Home</a>
                </li>

                <li>
                    <a href="#about" class="nav__link">About</a>
                </li>

                <li>
                    <a href="#skills" class="nav__link">Skills</a>
                </li>

                <li>
                    <a href="#projects" class="nav__link">Projects</a>
                </li>

                <li>
                    <a href="#resume" class="nav__link">Resume</a>
                </li>

                <li>
                    <a href="#contact" class="nav__link nav__link--cta">Contact</a>
                </li>
            </ul>

        </nav>
    </header>


    <main id="main">

        <!-- ============ 1. HERO ============ -->
        <section class="hero section" id="home">

            <div class="hero__glow hero__glow--1" aria-hidden="true"></div>
            <div class="hero__glow hero__glow--2" aria-hidden="true"></div>

            <div class="container hero__grid">

                <div class="hero__content">

                    <p class="hero__eyebrow reveal">
                        <span class="hero__status-dot" aria-hidden="true"></span>
                        Available for opportunities · Nepal
                    </p>

                    <h1 class="hero__title reveal" data-delay="1">
                        Hi, I'm
                        <span class="text-gradient">Pritam Limbu</span>
                    </h1>

                    <h2 class="hero__subtitle reveal" data-delay="2">
                        Computer Engineering Student
                        <span class="hero__amp">&amp;</span>
                        Web Developer
                    </h2>

                    <p class="hero__lead reveal" data-delay="3">
                        I study Computer Engineering and build practical web applications —
                        currently focused on the Laravel, PHP and MySQL stack. I care about
                        writing clean code and shipping things that actually work.
                    </p>


                    <div class="hero__actions reveal" data-delay="4">

                        <a href="#projects" class="btn btn--primary">
                            View My Projects

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>


                        <a href="#resume" class="btn btn--ghost">
                            Download CV
                        </a>


                        <a href="#contact" class="btn btn--text">
                            Contact Me →
                        </a>

                    </div>


                    <div class="hero__meta reveal" data-delay="5">

                        <div class="hero__meta-item">
                            <span class="hero__meta-label">
                                Focus
                            </span>

                            <span class="hero__meta-value">
                                Laravel · PHP · MySQL
                            </span>
                        </div>


                        <div class="hero__meta-item">
                            <span class="hero__meta-label">
                                Based in
                            </span>

                            <span class="hero__meta-value">
                                Nepal
                            </span>
                        </div>

                    </div>

                </div>


                <div class="hero__visual reveal" data-delay="3">

                    <div class="hero__photo-frame">

                        <!-- TODO: Replace with your real profile photo -->
                        <div
                            class="hero__photo-placeholder"
                            role="img"
                            aria-label="Profile photo placeholder"
                        >

                            <svg
                                width="72"
                                height="72"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>

                            <span>
                                Photo placeholder
                            </span>

                        </div>

                    </div>


                    <div class="hero__badge hero__badge--code glass">
                        <span class="code-dim">$</span>
                        php artisan serve
                    </div>


                    <div class="hero__badge hero__badge--stack glass">
                        <span class="dot dot--green"></span>
                        Laravel · MySQL
                    </div>

                </div>

            </div>


            <a
                href="#about"
                class="hero__scroll-hint"
                aria-label="Scroll to about section"
            >
                <span class="hero__scroll-line"></span>
                scroll
            </a>

        </section>


        <!-- ============ 2. ABOUT ============ -->
        <section class="section" id="about">

            <div class="container">

                <div class="section__head reveal">

                    <span class="section__index">
                        01
                    </span>

                    <h2 class="section__title">
                        About Me
                    </h2>

                    <p class="section__sub">
                        A little context on who I am and what I'm working on.
                    </p>

                </div>


                <div class="about__grid">

                    <div class="about__text reveal">

                        <p>
                            I'm Pritam Limbu, a Computer Engineering student from Nepal.
                            Alongside my studies, I'm developing practical skills in modern
                            web development — learning by building real projects rather than
                            just tutorials.
                        </p>

                        <p>
                            My current work centers on the
                            <strong>Laravel / PHP / MySQL</strong>
                            stack, where I've built a full online booking system from scratch.
                            I enjoy the full process: designing the database schema, writing
                            backend logic, and making the interface simple for people to use.
                        </p>

                        <p>
                            I'm early in my professional journey and honest about that —
                            what I bring is genuine curiosity, consistency, and a habit of
                            finishing what I start.
                        </p>

                    </div>


                    <aside
                        class="about__card glass reveal"
                        data-delay="2"
                        aria-label="Quick facts"
                    >

                        <h3 class="about__card-title">
                            Quick facts
                        </h3>


                        <dl class="about__facts">

                            <div class="about__fact">

                                <dt>
                                    Education
                                </dt>

                                <dd>
                                    B.E. Computer Engineering
                                    <span class="muted">
                                        (in progress)
                                    </span>
                                </dd>

                            </div>


                            <div class="about__fact">

                                <dt>
                                    Location
                                </dt>

                                <dd>
                                    Nepal
                                </dd>

                            </div>


                            <div class="about__fact">

                                <dt>
                                    Main interests
                                </dt>

                                <dd>
                                    Web development · Backend systems · Databases
                                </dd>

                            </div>


                            <div class="about__fact">

                                <dt>
                                    Current focus
                                </dt>

                                <dd>
                                    Laravel, PHP &amp; MySQL
                                </dd>

                            </div>

                        </dl>

                    </aside>

                </div>

            </div>

        </section>


        <!-- ============ 3. SKILLS ============ -->
        <section class="section section--alt" id="skills">

            <div class="container">

                <div class="section__head reveal">

                    <span class="section__index">
                        02
                    </span>

                    <h2 class="section__title">
                        Skills
                    </h2>

                    <p class="section__sub">
                        The tools I currently use to build for the web.
                    </p>

                </div>


                <div class="skills__grid">


                    <!-- Frontend -->
                    <article class="skill-card glass reveal">

                        <div class="skill-card__icon" aria-hidden="true">

                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m8 6-6 6 6 6M16 6l6 6-6 6"/>
                            </svg>

                        </div>

                        <h3 class="skill-card__title">
                            Frontend
                        </h3>

                        <ul class="chips">

                            <li class="chip">
                                HTML
                            </li>

                            <li class="chip">
                                CSS
                            </li>

                            <li class="chip">
                                JavaScript
                            </li>

                            <li class="chip">
                                Tailwind CSS
                            </li>

                        </ul>

                    </article>


                    <!-- Backend -->
                    <article
                        class="skill-card glass reveal"
                        data-delay="1"
                    >

                        <div class="skill-card__icon" aria-hidden="true">

                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <rect
                                    x="2"
                                    y="3"
                                    width="20"
                                    height="7"
                                    rx="2"
                                />

                                <rect
                                    x="2"
                                    y="14"
                                    width="20"
                                    height="7"
                                    rx="2"
                                />

                                <path d="M6 6.5h.01M6 17.5h.01"/>
                            </svg>

                        </div>

                        <h3 class="skill-card__title">
                            Backend
                        </h3>

                        <ul class="chips">

                            <li class="chip">
                                PHP
                            </li>

                            <li class="chip">
                                Laravel
                            </li>

                        </ul>

                    </article>


                    <!-- Database -->
                    <article
                        class="skill-card glass reveal"
                        data-delay="2"
                    >

                        <div class="skill-card__icon" aria-hidden="true">

                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <ellipse
                                    cx="12"
                                    cy="5"
                                    rx="9"
                                    ry="3"
                                />

                                <path d="M3 5v6c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/>

                                <path d="M3 11v6c0 1.66 4.03 3 9 3s9-1.34 9-3v-6"/>
                            </svg>

                        </div>

                        <h3 class="skill-card__title">
                            Database
                        </h3>

                        <ul class="chips">

                            <li class="chip">
                                MySQL
                            </li>

                        </ul>

                    </article>


                    <!-- Tools -->
                    <article
                        class="skill-card glass reveal"
                        data-delay="3"
                    >

                        <div class="skill-card__icon" aria-hidden="true">

                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M14.7 6.3a4.5 4.5 0 0 0-6 6L3 18l3 3 5.7-5.7a4.5 4.5 0 0 0 6-6L14 13l-3-3 3.7-3.7z"/>
                            </svg>

                        </div>

                        <h3 class="skill-card__title">
                            Tools
                        </h3>

                        <ul class="chips">

                            <li class="chip">
                                Git
                            </li>

                            <li class="chip">
                                GitHub
                            </li>

                            <li class="chip">
                                VS Code
                            </li>

                        </ul>

                    </article>

                </div>

            </div>

        </section>


        <!-- ============ 4. PROJECTS ============ -->
        <section class="section" id="projects">

            <div class="container">

                <div class="section__head reveal">

                    <span class="section__index">
                        03
                    </span>

                    <h2 class="section__title">
                        Featured Projects
                    </h2>

                    <p class="section__sub">
                        Things I've designed, built and shipped.
                    </p>

                </div>


                <!-- Featured project -->
                <article class="project-feature glass reveal">

                    <div class="project-feature__media">

                        <!-- TODO: Replace with real screenshot -->
                        <div
                            class="project-feature__placeholder"
                            aria-label="Saptashree Futsal screenshot placeholder"
                        >

                            <div class="project-feature__browser">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>


                            <div class="project-feature__placeholder-body">

                                <svg
                                    width="56"
                                    height="56"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <rect
                                        x="3"
                                        y="3"
                                        width="18"
                                        height="18"
                                        rx="2"
                                    />

                                    <circle
                                        cx="8.5"
                                        cy="8.5"
                                        r="1.5"
                                    />

                                    <path d="m21 15-5-5L5 21"/>
                                </svg>


                                <p>
                                    Project screenshot
                                    <br />

                                    <span class="muted">
                                        placeholder
                                    </span>
                                </p>

                            </div>

                        </div>


                        <span class="project-feature__tag">
                            Featured · Full-stack
                        </span>

                    </div>


                    <div class="project-feature__body">

                        <h3 class="project-feature__title">
                            Saptashree Futsal — Online Booking System
                        </h3>


                        <p class="project-feature__desc">
                            A futsal booking website built with Laravel, PHP and MySQL.
                            Customers can view futsal information, pick a date and time slot,
                            and manage their bookings through a clean, straightforward interface.
                        </p>


                        <h4 class="project-feature__label">
                            Key features
                        </h4>


                        <ul class="checklist">

                            <li>
                                Date &amp; time slot selection for bookings
                            </li>

                            <li>
                                Booking management (view / manage reservations)
                            </li>

                            <li>
                                Futsal information pages for customers
                            </li>

                            <li>
                                MySQL-backed data persistence via Laravel
                            </li>

                        </ul>


                        <ul class="chips chips--sm">

                            <li class="chip">
                                Laravel
                            </li>

                            <li class="chip">
                                PHP
                            </li>

                            <li class="chip">
                                MySQL
                            </li>

                            <li class="chip">
                                Tailwind CSS
                            </li>

                        </ul>


                        <div class="project-feature__actions">

                            <!-- Placeholder links -->
                            <a
                                href="#"
                                class="btn btn--primary btn--sm"
                                aria-disabled="true"
                                title="Placeholder — link coming soon"
                            >
                                Live Demo

                                <svg
                                    width="14"
                                    height="14"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                    <path d="M15 3h6v6"/>
                                    <path d="M10 14 21 3"/>
                                </svg>
                            </a>


                            <a
                                href="#"
                                class="btn btn--ghost btn--sm"
                                aria-disabled="true"
                                title="Placeholder — link coming soon"
                            >

                                <svg
                                    width="14"
                                    height="14"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55v-2.17c-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.09-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.83 1.19 3.09 0 4.41-2.69 5.38-5.25 5.66.41.36.78 1.06.78 2.14v3.17c0 .3.21.67.8.55A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                                </svg>

                                GitHub

                            </a>


                            <span class="placeholder-note">
                                Links are placeholders — deploy coming soon
                            </span>

                        </div>

                    </div>

                </article>


                <!-- Coming soon -->
                <div class="projects__grid">


                    <article
                        class="project-card glass reveal"
                        data-delay="1"
                    >

                        <div class="project-card__top">

                            <span
                                class="project-card__icon"
                                aria-hidden="true"
                            >

                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V4a2 2 0 0 0-2-2H6.5A2.5 2.5 0 0 0 4 4.5v15z"/>
                                </svg>

                            </span>


                            <span class="badge-soon">
                                Coming soon
                            </span>

                        </div>


                        <h3 class="project-card__title">
                            Project Two
                        </h3>


                        <p class="project-card__desc">
                            The next build is in the works. This space will be updated with
                            a real project, its stack and a live link once it's ready.
                        </p>


                        <ul class="chips chips--sm">

                            <li class="chip chip--muted">
                                TBD
                            </li>

                        </ul>

                    </article>


                    <article
                        class="project-card glass reveal"
                        data-delay="2"
                    >

                        <div class="project-card__top">

                            <span
                                class="project-card__icon"
                                aria-hidden="true"
                            >

                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V4a2 2 0 0 0-2-2H6.5A2.5 2.5 0 0 0 4 4.5v15z"/>
                                </svg>

                            </span>


                            <span class="badge-soon">
                                Coming soon
                            </span>

                        </div>


                        <h3 class="project-card__title">
                            Project Three
                        </h3>


                        <p class="project-card__desc">
                            Another idea is being scoped out. No invented details here —
                            check back once it ships.
                        </p>


                        <ul class="chips chips--sm">

                            <li class="chip chip--muted">
                                TBD
                            </li>

                        </ul>

                    </article>

                </div>

            </div>

        </section>


        <!-- ============ 5. RESUME ============ -->
        <section class="section section--alt" id="resume">

            <div class="container">

                <div class="section__head reveal">

                    <span class="section__index">
                        04
                    </span>

                    <h2 class="section__title">
                        Resume
                    </h2>

                    <p class="section__sub">
                        Education, skills and projects at a glance.
                    </p>

                </div>


                <div class="resume__grid">


                    <!-- Left -->
                    <div class="resume__col">


                        <!-- Education -->
                        <div class="resume__block glass reveal">

                            <h3 class="resume__heading">

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <path d="M22 10 12 5 2 10l10 5 10-5z"/>
                                    <path d="M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5"/>
                                </svg>

                                Education

                            </h3>


                            <div class="resume__item">

                                <div class="resume__item-head">

                                    <h4>
                                        B.E. in Computer Engineering
                                    </h4>

                                    <span class="resume__pill">
                                        In progress
                                    </span>

                                </div>


                                <p class="resume__item-sub">
                                    Nepal ·
                                    <span class="muted">
                                        institution name — placeholder
                                    </span>
                                </p>


                                <p class="resume__item-desc">
                                    Studying core computer engineering fundamentals while
                                    building practical web development skills through
                                    personal projects.
                                </p>

                            </div>

                        </div>


                        <!-- Experience -->
                        <div
                            class="resume__block glass reveal"
                            data-delay="1"
                        >

                            <h3 class="resume__heading">

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <rect
                                        x="2"
                                        y="7"
                                        width="20"
                                        height="14"
                                        rx="2"
                                    />

                                    <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                                </svg>

                                Experience

                            </h3>


                            <div class="resume__item">

                                <div class="resume__item-head">

                                    <h4>
                                        Professional experience
                                    </h4>

                                    <span class="resume__pill resume__pill--muted">
                                        Placeholder
                                    </span>

                                </div>


                                <p class="resume__item-desc">
                                    No professional work experience yet — intentionally
                                    left blank rather than padded. In the meantime, my
                                    projects below are where I do my learning in public.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Right -->
                    <div class="resume__col">


                        <!-- Technical skills -->
                        <div
                            class="resume__block glass reveal"
                            data-delay="2"
                        >

                            <h3 class="resume__heading">

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <path d="M14.7 6.3a4.5 4.5 0 0 0-6 6L3 18l3 3 5.7-5.7a4.5 4.5 0 0 0 6-6L14 13l-3-3 3.7-3.7z"/>
                                </svg>

                                Technical Skills

                            </h3>


                            <ul class="resume__skills">

                                <li>
                                    <span>Frontend</span>
                                    HTML · CSS · JavaScript · Tailwind CSS
                                </li>

                                <li>
                                    <span>Backend</span>
                                    PHP · Laravel
                                </li>

                                <li>
                                    <span>Database</span>
                                    MySQL
                                </li>

                                <li>
                                    <span>Tools</span>
                                    Git · GitHub · VS Code
                                </li>

                            </ul>

                        </div>


                        <!-- Projects -->
                        <div
                            class="resume__block glass reveal"
                            data-delay="3"
                        >

                            <h3 class="resume__heading">

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >
                                    <path d="M16 18 22 12 16 6M8 6 2 12l6 6"/>
                                </svg>

                                Projects

                            </h3>


                            <div class="resume__item">

                                <div class="resume__item-head">

                                    <h4>
                                        Saptashree Futsal — Online Booking System
                                    </h4>

                                </div>


                                <p class="resume__item-sub">
                                    Laravel · PHP · MySQL
                                </p>


                                <p class="resume__item-desc">
                                    Full booking flow: futsal info pages, date/time slot
                                    selection and booking management. See the Projects
                                    section for details.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Resume CTA -->
                <div class="resume__cta reveal">

                    <p>
                        Want the one-page version?
                    </p>


                    <!-- TODO: Add your actual CV -->
                    <a
                        href="#"
                        class="btn btn--primary"
                        aria-disabled="true"
                        title="Placeholder — add your CV file"
                    >

                        Download CV

                        <svg
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <path d="m7 10 5 5 5-5"/>
                            <path d="M12 15V3"/>
                        </svg>

                    </a>


                    <span class="placeholder-note">
                        CV file placeholder — add PDF to enable
                    </span>

                </div>

            </div>

        </section>


        <!-- ============ 6. CONTACT ============ -->
        <section class="section" id="contact">

            <div class="container">

                <div class="section__head reveal">

                    <span class="section__index">
                        05
                    </span>

                    <h2 class="section__title">
                        Get In Touch
                    </h2>

                    <p class="section__sub">
                        Have a project, question or opportunity? Send a message.
                    </p>

                </div>


                <div class="contact__grid">


                    <!-- Contact information -->
                    <div class="contact__info reveal">


                        <!-- Email -->
                        <a
                            class="contact__row glass"
                            href="mailto:your.email@example.com"
                        >

                            <span
                                class="contact__icon"
                                aria-hidden="true"
                            >

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <rect
                                        x="2"
                                        y="4"
                                        width="20"
                                        height="16"
                                        rx="2"
                                    />

                                    <path d="m22 7-10 6L2 7"/>
                                </svg>

                            </span>


                            <span class="contact__row-body">

                                <span class="contact__row-label">
                                    Email
                                </span>

                                <span class="contact__row-value">
                                    your.email@example.com

                                    <em class="ph-tag">
                                        placeholder
                                    </em>
                                </span>

                            </span>

                        </a>


                        <!-- GitHub -->
                        <a
                            class="contact__row glass"
                            href="#"
                            aria-disabled="true"
                        >

                            <span
                                class="contact__icon"
                                aria-hidden="true"
                            >

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55v-2.17c-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.09-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.83 1.19 3.09 0 4.41-2.69 5.38-5.25 5.66.41.36.78 1.06.78 2.14v3.17c0 .3.21.67.8.55A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                                </svg>

                            </span>


                            <span class="contact__row-body">

                                <span class="contact__row-label">
                                    GitHub
                                </span>

                                <span class="contact__row-value">
                                    github.com/your-username

                                    <em class="ph-tag">
                                        placeholder
                                    </em>
                                </span>

                            </span>

                        </a>


                        <!-- LinkedIn -->
                        <a
                            class="contact__row glass"
                            href="#"
                            aria-disabled="true"
                        >

                            <span
                                class="contact__icon"
                                aria-hidden="true"
                            >

                                <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.36V9h3.4v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z"/>
                                </svg>

                            </span>


                            <span class="contact__row-body">

                                <span class="contact__row-label">
                                    LinkedIn
                                </span>

                                <span class="contact__row-value">
                                    linkedin.com/in/your-profile

                                    <em class="ph-tag">
                                        placeholder
                                    </em>
                                </span>

                            </span>

                        </a>


                        <p class="contact__note">
                            Details marked
                            <em class="ph-tag">placeholder</em>
                            are intentionally generic — they'll be swapped for real links soon.
                        </p>

                    </div>


                    <!-- Contact form -->
                    <form
                        class="contact__form glass reveal"
                        data-delay="2"
                        id="contactForm"
                        novalidate
                    >

                        <div class="form__row">

                            <div class="form__group">

                                <label for="name">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Your name"
                                    required
                                    autocomplete="name"
                                />

                            </div>


                            <div class="form__group">

                                <label for="email">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="you@example.com"
                                    required
                                    autocomplete="email"
                                />

                            </div>

                        </div>


                        <div class="form__group">

                            <label for="subject">
                                Subject
                            </label>

                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                placeholder="What's this about?"
                            />

                        </div>


                        <div class="form__group">

                            <label for="message">
                                Message
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Tell me about your project or question..."
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn btn--primary btn--full"
                        >

                            Send Message

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="m22 2-7 20-4-9-9-4 20-7z"/>
                            </svg>

                        </button>


                        <p
                            class="form__status"
                            id="formStatus"
                            role="status"
                            aria-live="polite"
                        ></p>

                    </form>

                </div>

            </div>

        </section>

    </main>


    <!-- ============ 7. FOOTER ============ -->
    <footer class="footer">

        <div class="container footer__grid">


            <div class="footer__brand">

                <a href="#home" class="nav__logo">
                    <span class="nav__logo-bracket">&lt;</span>pritam<span class="nav__logo-accent">.</span>dev<span class="nav__logo-bracket">/&gt;</span>
                </a>

                <p>
                    Computer Engineering Student &amp; Web Developer
                </p>

            </div>


            <nav
                class="footer__nav"
                aria-label="Footer navigation"
            >

                <a href="#home">
                    Home
                </a>

                <a href="#about">
                    About
                </a>

                <a href="#skills">
                    Skills
                </a>

                <a href="#projects">
                    Projects
                </a>

                <a href="#resume">
                    Resume
                </a>

                <a href="#contact">
                    Contact
                </a>

            </nav>


            <div class="footer__social">

                <!-- TODO: Replace with real profiles -->

                <a
                    href="#"
                    aria-label="GitHub (placeholder)"
                    title="GitHub — placeholder"
                >

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55v-2.17c-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.09-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.83 1.19 3.09 0 4.41-2.69 5.38-5.25 5.66.41.36.78 1.06.78 2.14v3.17c0 .3.21.67.8.55A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                    </svg>

                </a>


                <a
                    href="#"
                    aria-label="LinkedIn (placeholder)"
                    title="LinkedIn — placeholder"
                >

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.36V9h3.4v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z"/>
                    </svg>

                </a>

            </div>

        </div>


        <div class="container footer__bottom">

            <p>
                © <span id="year"></span>
                Pritam Limbu. Built with care in Nepal.
            </p>

        </div>

    </footer>


    <!-- Main JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>

