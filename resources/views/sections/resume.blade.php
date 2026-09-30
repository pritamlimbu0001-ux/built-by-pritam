```blade
{{-- ================= RESUME ================= --}}
<section class="section" id="resume">
    <div class="container">

        <div class="section__head reveal">
            <span class="section__kicker">04 · Resume</span>

            <h2 class="section__title">
                Resume
            </h2>

            <p class="section__sub">
                My education, skills and projects at a glance.
            </p>
        </div>


        <div class="resume__grid">


            {{-- ================= EDUCATION ================= --}}
            <div class="resume-block reveal">

                <h3 class="resume-block__title">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>

                    Education

                </h3>


                <div class="resume-item">

                    <h4>
                        Bachelor of Computer Engineering
                    </h4>

                    <p class="resume-item__place">
                        Madan Bhandari Memorial College of Engineering

                        <span class="tag tag--soft">
                            In progress
                        </span>
                    </p>

                    <p class="muted">
                        Pokhara University · Nepal
                    </p>

                </div>

            </div>


            {{-- ================= TECHNICAL SKILLS ================= --}}
            <div class="resume-block reveal">

                <h3 class="resume-block__title">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>

                    Technical Skills

                </h3>


                <ul class="resume-list">

                    <li>
                        <strong>Languages &amp; frameworks:</strong>
                        PHP, Laravel, JavaScript, HTML, CSS
                    </li>

                    <li>
                        <strong>Styling:</strong>
                        Tailwind CSS
                    </li>

                    <li>
                        <strong>Database:</strong>
                        MySQL
                    </li>

                    <li>
                        <strong>Tools:</strong>
                        Git, GitHub, VS Code
                    </li>

                </ul>

            </div>


            {{-- ================= PROJECTS ================= --}}
            <div class="resume-block reveal">

                <h3 class="resume-block__title">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <path d="M3 9l9-6 9 6v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>

                    Projects

                </h3>


                <div class="resume-item">

                    <h4>
                        Saptashree Futsal — Online Booking System
                    </h4>

                    <p class="muted">
                        Laravel · PHP · MySQL — futsal information,
                        slot selection and booking management.
                    </p>

                </div>


                <div class="resume-item">

                    <h4>
                        Personal Portfolio Website
                    </h4>

                    <p class="muted">
                        Laravel · PHP · MySQL · HTML · CSS — personal
                        portfolio, projects, resume and contact management.
                    </p>

                </div>


                <div class="resume-item">

                    <h4>
                        More projects
                    </h4>

                    <p class="muted">
                        Coming soon.
                    </p>

                </div>

            </div>


            {{-- ================= EXPERIENCE ================= --}}
            <div class="resume-block reveal">

                <h3 class="resume-block__title">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true"
                    >
                        <rect
                            x="2"
                            y="7"
                            width="20"
                            height="14"
                            rx="2"
                        />

                        <path
                            d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"
                        />
                    </svg>

                    Experience

                </h3>


                <div class="resume-item">

                    <p class="muted">
                        No professional work experience yet —
                        currently focused on my studies and building
                        projects. Open to internships and junior opportunities.
                    </p>

                </div>

            </div>


        </div>


        {{-- ================= DOWNLOAD CV ================= --}}

        <div class="resume__cta reveal">

            <a
                href="{{ route('cv.download') }}"
                class="btn btn--primary"
                title="Download CV (PDF)"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>

                Download CV

            </a>

        </div>

    </div>
</section>
```
