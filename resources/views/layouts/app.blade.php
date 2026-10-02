<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >


    {{-- =========================================================
         SEO
    ========================================================== --}}

    <title>
        @yield(
            'title',
            'Pritam Limbu — Computer Engineering Student & Software Developer'
        )
    </title>

    <meta
        name="description"
        content="Portfolio of Pritam Limbu, a Computer Engineering student and software developer from Nepal."
    >

    <meta
        name="author"
        content="Pritam Limbu"
    >

    <meta
        property="og:title"
        content="Pritam Limbu — Software Developer"
    >

    <meta
        property="og:description"
        content="Computer Engineering Student & Software Developer from Nepal."
    >

    <meta
        property="og:type"
        content="website"
    >


    {{-- =========================================================
         FAVICON
         File: public/favicon.png
    ========================================================== --}}

    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('favicon.png') }}"
    >

    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('favicon.png') }}"
    >

    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset('favicon.png') }}"
    >


    {{-- =========================================================
         GOOGLE FONTS
    ========================================================== --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet"
    >


    {{-- =========================================================
         MAIN CSS
    ========================================================== --}}

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    @stack('styles')

</head>


<body>


    {{-- =========================================================
         SKIP LINK
    ========================================================== --}}

    <a
        class="skip-link"
        href="#main"
    >
        Skip to content
    </a>


    {{-- =========================================================
         NAVIGATION
    ========================================================== --}}

    <header
        class="site-header"
        id="siteHeader"
    >

        <nav
            class="nav container"
            aria-label="Main navigation"
        >


            {{-- =================================================
                 BRAND
            ================================================== --}}

            <a
                href="#home"
                class="nav__brand"
            >

                <span class="nav__brand-mark">
                    &lt;/&gt;
                </span>

                <span class="nav__brand-name">
                    pritam<span class="accent">.dev</span>
                </span>

            </a>


            {{-- =================================================
                 MOBILE MENU BUTTON
            ================================================== --}}

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


            {{-- =================================================
                 NAVIGATION MENU
            ================================================== --}}

            <ul
                class="nav__menu"
                id="navMenu"
            >

                <li>

                    <a
                        href="#home"
                        class="nav__link is-active"
                    >
                        Home
                    </a>

                </li>


                <li>

                    <a
                        href="#about"
                        class="nav__link"
                    >
                        About
                    </a>

                </li>


                <li>

                    <a
                        href="#skills"
                        class="nav__link"
                    >
                        Skills
                    </a>

                </li>


                <li>

                    <a
                        href="#projects"
                        class="nav__link"
                    >
                        Projects
                    </a>

                </li>


                <li>

                    <a
                        href="#resume"
                        class="nav__link"
                    >
                        Resume
                    </a>

                </li>


                <li>

                    <a
                        href="#contact"
                        class="nav__link"
                    >
                        Contact
                    </a>

                </li>

            </ul>

        </nav>

    </header>


    {{-- =========================================================
         MAIN CONTENT
    ========================================================== --}}

    <main id="main">

        @yield('content')

    </main>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="footer">

        <div class="container footer__inner">


            {{-- =================================================
                 FOOTER IDENTITY
            ================================================== --}}

            <div class="footer__identity">

                <a
                    href="#home"
                    class="footer__name"
                >
                    Pritam Limbu
                </a>

                <p class="footer__tagline">
                    Computer Engineering Student &amp; Software Developer
                </p>

            </div>


            {{-- =================================================
                 FOOTER NAVIGATION
            ================================================== --}}

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


            {{-- =================================================
                 FOOTER SOCIAL LINKS
            ================================================== --}}

            <div class="footer__social">

                @forelse ($socialLinks ?? [] as $link)

                    <a
                        href="{{ $link->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social-link"
                        aria-label="{{ $link->platform }} profile"
                    >

                        <span class="social-link__initial">

                            {{ Str::upper(
                                Str::substr(
                                    $link->platform,
                                    0,
                                    1
                                )
                            ) }}

                        </span>

                    </a>

                @empty

                    {{-- Social links appear here automatically
                         once added from the admin panel --}}

                @endforelse

            </div>

        </div>


        {{-- =========================================================
             FOOTER BOTTOM
        ========================================================== --}}

        <div class="footer__bottom">

            <p>
                &copy; {{ date('Y') }} Pritam Limbu. All rights reserved.
            </p>

        </div>

    </footer>


    {{-- =========================================================
         TOAST
    ========================================================== --}}

    <div
        class="toast"
        id="toast"
        role="status"
        aria-live="polite"
    ></div>


    {{-- =========================================================
         JAVASCRIPT
    ========================================================== --}}

    <script
        src="{{ asset('js/main.js') }}"
        defer
    ></script>

    @stack('scripts')


</body>
</html>