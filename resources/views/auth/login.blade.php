<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#006B38">
    <title>Admin Login &middot; {{ config('app.name', 'Philadelphia Gospel Assembly') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|fraunces:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @if (file_exists(public_path('build/assets/app.css')))
            <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        @endif
        @if (file_exists(public_path('build/assets/app.js')))
            <script src="{{ asset('build/assets/app.js') }}" defer></script>
        @endif
    @endif
</head>
<body class="min-h-screen antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">
        {{-- Brand panel --}}
        <aside class="relative hidden overflow-hidden lg:flex lg:flex-col lg:justify-between"
               style="background-image: linear-gradient(165deg, rgba(6, 77, 43, 0.94), rgba(3, 47, 25, 0.97)), url('{{ asset('images/pjiladelphia full gospel assembly.jpg') }}'); background-size: cover; background-position: center;">
            <span class="blob right-[-4rem] top-[-3rem] h-64 w-64 bg-pga-gold/40"></span>
            <span class="blob bottom-[-5rem] left-[-3rem] h-56 w-56 bg-pga-red/30"></span>

            <div class="relative z-10 p-12">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/95 shadow-lg">
                        <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                             class="h-9 w-9 object-contain" width="360" height="360">
                    </span>
                    <span class="leading-tight">
                        <span class="block font-display text-lg font-semibold text-white">Philadelphia</span>
                        <span class="block text-[0.65rem] font-bold uppercase tracking-[0.26em] text-pga-gold-soft">
                            Gospel Assembly
                        </span>
                    </span>
                </a>
            </div>

            <div class="relative z-10 px-12 pb-16">
                <p class="eyebrow eyebrow--light">Admin Console</p>
                <h1 class="mt-5 max-w-md font-display text-4xl font-semibold leading-tight text-white">
                    Steward the message with excellence.
                </h1>
                <p class="mt-4 max-w-md text-sm leading-relaxed text-white/75">
                    Sign in to manage sermons, events, ministries and announcements for the congregation.
                </p>
                <p class="mt-8 border-l-2 border-pga-gold/60 pl-4 font-display text-sm italic text-white/70">
                    &ldquo;Let all things be done decently and in order.&rdquo;
                    <span class="mt-1 block text-[0.7rem] not-italic uppercase tracking-[0.2em] text-pga-gold-soft">1 Corinthians 14:40</span>
                </p>
            </div>
        </aside>

        {{-- Form panel --}}
        <main class="flex items-center justify-center px-4 py-12 sm:px-8">
            <div class="w-full max-w-md">
                <a href="{{ route('home') }}" class="mb-8 inline-flex items-center gap-3 lg:hidden">
                    <span class="grid h-11 w-11 place-items-center rounded-2xl bg-white shadow-md">
                        <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                             class="h-8 w-8 object-contain" width="360" height="360">
                    </span>
                    <span class="leading-tight">
                        <span class="block font-display text-base font-semibold text-pga-ink">Philadelphia</span>
                        <span class="block text-[0.62rem] font-bold uppercase tracking-[0.24em] text-pga-green">
                            Gospel Assembly
                        </span>
                    </span>
                </a>

                <div class="admin-card p-7 sm:p-9">
                    <p class="eyebrow">Welcome Back</p>
                    <h2 class="mt-4 font-display text-2xl font-semibold text-pga-ink">Sign in to the Admin Console</h2>
                    <p class="mt-1.5 text-sm text-pga-muted">Enter your credentials to continue.</p>

                    @if ($errors->any())
                        <div class="mt-6 rounded-2xl border border-pga-red/25 bg-pga-red/8 px-4 py-3 text-sm text-pga-red-deep">
                            <ul class="space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
                        @csrf
                        <div>
                            <label for="email" class="admin-label">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   class="field" required autofocus autocomplete="username">
                        </div>

                        <div>
                            <label for="password" class="admin-label">Password</label>
                            <input id="password" type="password" name="password"
                                   class="field" required autocomplete="current-password">
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2.5 text-sm font-medium text-pga-ink">
                                <input type="checkbox" name="remember" class="admin-check"> Remember me
                            </label>
                            <a href="{{ route('home') }}" class="text-sm font-semibold text-pga-green transition-colors hover:text-pga-gold-deep">
                                Back to website
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary w-full">
                            Sign In
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12l-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-pga-muted">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Philadelphia Gospel Assembly') }}
                </p>
            </div>
        </main>
    </div>
</body>
</html>
