/* ============================================================
   Pritam Limbu — Portfolio
   Navigation, scroll state, active links, reveal animations,
   and placeholder toast
   ============================================================ */

(function () {
    'use strict';


    /* =========================================================
       ELEMENTS
    ========================================================== */

    var header = document.getElementById('siteHeader');
    var toggle = document.getElementById('navToggle');
    var menu = document.getElementById('navMenu');

    var links = Array.prototype.slice.call(
        document.querySelectorAll('.nav__link')
    );


    /* =========================================================
       MOBILE MENU
    ========================================================== */

    if (toggle && menu) {

        toggle.addEventListener('click', function () {

            var open = menu.classList.toggle('is-open');

            toggle.setAttribute(
                'aria-expanded',
                open ? 'true' : 'false'
            );

        });


        // Close menu when a navigation link is clicked
        menu.addEventListener('click', function (e) {

            var link = e.target.closest('.nav__link');

            if (link) {

                menu.classList.remove('is-open');

                toggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        });

    }


    /* =========================================================
       HEADER SHADOW ON SCROLL
    ========================================================== */

    function onScroll() {

        if (header) {

            header.classList.toggle(
                'is-scrolled',
                window.scrollY > 8
            );

        }

    }

    window.addEventListener(
        'scroll',
        onScroll,
        { passive: true }
    );

    onScroll();


    /* =========================================================
       SCROLL REVEAL
    ========================================================== */

    var revealEls =
        document.querySelectorAll('.reveal');


    if ('IntersectionObserver' in window) {

        var observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (entry.isIntersecting) {

                                entry.target.classList.add(
                                    'is-visible'
                                );

                                observer.unobserve(
                                    entry.target
                                );

                            }

                        }
                    );

                },
                {
                    threshold: 0.12,
                    rootMargin:
                        '0px 0px -40px 0px'
                }
            );


        revealEls.forEach(function (el) {

            observer.observe(el);

        });

    } else {

        // Fallback for older browsers

        revealEls.forEach(function (el) {

            el.classList.add(
                'is-visible'
            );

        });

    }


    /* =========================================================
       ACTIVE NAV LINK ON SCROLL
    ========================================================== */

    var sections = links
        .map(function (link) {

            return document.querySelector(
                link.getAttribute('href')
            );

        })
        .filter(Boolean);


    if (
        'IntersectionObserver' in window &&
        sections.length
    ) {

        var sectionObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (entry.isIntersecting) {

                                links.forEach(
                                    function (link) {

                                        link.classList.toggle(
                                            'is-active',
                                            link.getAttribute(
                                                'href'
                                            ) ===
                                            '#' +
                                            entry.target.id
                                        );

                                    }
                                );

                            }

                        }
                    );

                },
                {
                    rootMargin:
                        '-40% 0px -55% 0px'
                }
            );


        sections.forEach(function (section) {

            sectionObserver.observe(
                section
            );

        });

    }


    /* =========================================================
       TOAST
    ========================================================== */

    var toast =
        document.getElementById('toast');

    var toastTimer = null;


    function showToast(message) {

        if (!toast) {
            return;
        }

        toast.textContent = message;

        toast.classList.add(
            'is-show'
        );


        clearTimeout(
            toastTimer
        );


        toastTimer = setTimeout(
            function () {

                toast.classList.remove(
                    'is-show'
                );

            },
            3200
        );

    }


    /* =========================================================
       PLACEHOLDER LINK HANDLER
    ========================================================== */

    document.addEventListener(
        'click',
        function (e) {

            var el =
                e.target.closest(
                    '[data-soon]'
                );


            if (!el) {
                return;
            }


            e.preventDefault();


            showToast(
                el.getAttribute(
                    'data-soon'
                ) ||
                'Coming soon.'
            );

        }
    );


})();