<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title>Admin Login — Pritam Limbu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-body">

    <div class="login-page">

        <div class="login-card">

            {{-- Header --}}
            <div class="login-card__head">

                <span class="nav__brand-mark">&lt;/&gt;</span>

                <h1>Admin Login</h1>

                <p>Pritam Limbu — Portfolio CMS</p>

            </div>


            {{-- Logout / Status Message --}}
            @if (session('status'))
                <div
                    class="admin-alert admin-alert--ok"
                    role="status"
                >
                    {{ session('status') }}
                </div>
            @endif


            {{-- Login Form --}}
            <form
                method="POST"
                action="{{ route('admin.login.store') }}"
                class="login-form"
            >

                @csrf


                {{-- Email --}}
                <div class="form-field">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="admin@example.com"
                    >

                    @error('email')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Password --}}
                <div class="form-field">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Your password"
                    >

                    @error('password')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Remember Me --}}
                <label class="login-form__remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        {{ old('remember') ? 'checked' : '' }}
                    >

                    <span>Remember me</span>

                </label>


                {{-- Submit --}}
                <button
                    type="submit"
                    class="btn btn--primary btn--full"
                >
                    Sign In
                </button>

            </form>


            {{-- Back to Website --}}
            <a
                href="{{ route('home') }}"
                class="login-card__back"
            >
                &larr; Back to website
            </a>

        </div>

    </div>

</body>
</html>