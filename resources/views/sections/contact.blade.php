{{-- ================= CONTACT ================= --}}
@php
    $socialIcons = [
        'github' => '<path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.28-.01-1.02-.02-2-3.2.7-3.88-1.54-3.88-1.54-.53-1.33-1.28-1.69-1.28-1.69-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.09-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.8 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.83 1.19 3.09 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .31.21.68.8.56A10.52 10.52 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>',

        'linkedin' => '<path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.55V9h3.57v11.45z"/>',

        'default' => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
    ];
@endphp

<section class="section" id="contact">
    <div class="container">

        <div class="section__head reveal">
            <span class="section__kicker">05 · Contact</span>
            <h2 class="section__title">Get in touch</h2>
            <p class="section__sub">
                Have a project idea or an opportunity? Send me a message.
            </p>
        </div>

        <div class="contact__grid">

            <div class="contact__info reveal">

                {{-- Email --}}
                <a
                    class="contact__item"
                    href="mailto:pritamlimbu0001@gmail.com"
                >
                    <span class="contact__item-icon">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            aria-hidden="true"
                        >
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>

                    <span>
                        <strong>Email</strong>
                        <span class="muted">
                            pritamlimbu0001@gmail.com
                        </span>
                    </span>
                </a>


                {{-- WhatsApp --}}
                <a
                    class="contact__item"
                    href="https://wa.me/9779828674535"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <span class="contact__item-icon">
                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="M21 11.5a8.38 8.38 0 0 1-9 8.5 8.5 8.5 0 0 1-4.13-1.07L3 20l1.13-4.87A8.38 8.38 0 0 1 3.5 11.5 8.5 8.5 0 1 1 21 11.5z"/>
                            <path d="M8 9.5c.2 2 1.8 4 4 5 .7.3 1.5.5 2.3.5"/>
                        </svg>
                    </span>

                    <span>
                        <strong>WhatsApp</strong>
                        <span class="muted">
                            +977 9828674535
                        </span>
                    </span>
                </a>


                {{-- Social Links --}}
                @forelse ($socialLinks as $link)

                    @php
                        $icon = Str::lower($link->icon ?: $link->platform);

                        $isFilledIcon = in_array(
                            $icon,
                            ['github', 'linkedin']
                        );
                    @endphp

                    <a
                        class="contact__item"
                        href="{{ $link->url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <span class="contact__item-icon">
                            <svg
                                viewBox="0 0 24 24"
                                fill="{{ $isFilledIcon ? 'currentColor' : 'none' }}"
                                stroke="{{ $isFilledIcon ? 'none' : 'currentColor' }}"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                {!! $socialIcons[$icon] ?? $socialIcons['default'] !!}
                            </svg>
                        </span>

                        <span>
                            <strong>{{ $link->platform }}</strong>
                            <span class="muted">
                                {{ preg_replace('#^https?://#', '', $link->url) }}
                            </span>
                        </span>
                    </a>

                @empty

                    <a
                        class="contact__item"
                        href="#"
                        data-soon="Social links will be added soon."
                    >
                        <span class="contact__item-icon">
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <circle cx="18" cy="5" r="3"/>
                                <circle cx="6" cy="12" r="3"/>
                                <circle cx="18" cy="19" r="3"/>
                                <line x1="8.6" y1="10.5" x2="15.4" y2="6.5"/>
                                <line x1="8.6" y1="13.5" x2="15.4" y2="17.5"/>
                            </svg>
                        </span>

                        <span>
                            <strong>Social profiles</strong>
                            <span class="muted">
                                Coming soon
                                <em class="ph-tag">placeholder</em>
                            </span>
                        </span>
                    </a>

                @endforelse


                <p class="contact__note">
                    Based in {{ $profile->location ?? 'Nepal' }}
                    · Available for internships, freelance work and
                    collaboration on web projects.
                </p>

            </div>


            {{-- Contact Form --}}
            <form
                class="contact__form reveal reveal--delay"
                method="POST"
                action="{{ route('contact.store') }}"
                novalidate
            >
                @csrf

                @if (session('status'))
                    <div
                        class="form-status form-status--ok"
                        role="status"
                    >
                        {{ session('status') }}
                    </div>
                @endif


                <div class="form-row">

                    <div class="form-field">
                        <label for="name">Name</label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            maxlength="100"
                            placeholder="Your name"
                        >

                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-field">
                        <label for="email">Email</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            maxlength="255"
                            placeholder="you@example.com"
                        >

                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <div class="form-field">
                    <label for="subject">
                        Subject
                        <span class="muted">(optional)</span>
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        maxlength="150"
                        placeholder="What's this about?"
                    >

                    @error('subject')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field">
                    <label for="message">Message</label>

                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        required
                        maxlength="3000"
                        placeholder="Tell me about your project or opportunity..."
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>


                <button
                    type="submit"
                    class="btn btn--primary btn--full"
                >
                    Send Message

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 22 2"/>
                    </svg>
                </button>

            </form>

        </div>
    </div>
</section>