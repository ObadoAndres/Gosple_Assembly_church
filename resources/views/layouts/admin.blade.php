<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#006B38">
    <meta name="robots" content="noindex, nofollow">
    @php
        $adminTitle = strip_tags($__env->yieldContent('title', 'Admin'));
    @endphp
    <title>{{ $adminTitle }} &middot; {{ config('app.name', 'Philadelphia Gospel Assembly') }}</title>

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
<body id="top" class="min-h-screen antialiased">
    <a href="#admin-content"
       class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-pga-green focus:px-5 focus:py-2 focus:text-white">
        Skip to content
    </a>

    @php
        $adminNav = [
            ['group' => 'Overview', 'items' => [
                ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'admin.dashboard',
                 'icon' => 'M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15A2.25 2.25 0 0 1 6 12.75h2.25A2.25 2.25 0 0 1 10.5 15v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V15ZM13.5 6A2.25 2.25 0 0 1 15.75 3.75H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 15v2.25A2.25 2.25 0 0 1 18 19.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V15Z'],
            ]],
            ['group' => 'Content', 'items' => [
                ['label' => 'Sermons', 'route' => 'admin.sermons.index', 'active' => 'admin.sermons.*',
                 'icon' => 'M12 6.75a6.75 6.75 0 0 0-6.75 6.75v3.75h3.75V13.5H6.75m10.5 3.75H13.5V13.5h3.75m0 3.75v3a3 3 0 0 1-3 3h-3'],
                ['label' => 'Events', 'route' => 'admin.events.index', 'active' => 'admin.events.*',
                 'icon' => 'M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z'],
                ['label' => 'Ministries', 'route' => 'admin.ministries.index', 'active' => 'admin.ministries.*',
                 'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72M18 18.72a3 3 0 0 0 .513-5.962M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6 18.72a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1 4.682-2.72M6 18.72a9.094 9.094 0 0 0 3.741-.479'],
                ['label' => 'Announcements', 'route' => 'admin.announcements.index', 'active' => 'admin.announcements.*',
                 'icon' => 'M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46'],
            ]],
        ];
    @endphp

    <div id="admin-overlay" class="admin-overlay" aria-hidden="true"></div>

    {{-- ================= Sidebar ================= --}}
    <aside id="admin-sidebar" class="admin-sidebar" aria-hidden="false" aria-label="Admin navigation">
        <div class="flex items-center justify-between gap-3 border-b border-white/10 px-5 py-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-white/95 shadow-lg">
                    <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                         class="h-8 w-8 object-contain" width="360" height="360">
                </span>
                <span class="leading-tight">
                    <span class="block font-display text-base font-semibold text-white">Philadelphia</span>
                    <span class="block text-[0.62rem] font-bold uppercase tracking-[0.24em] text-pga-gold-soft">
                        Admin Console
                    </span>
                </span>
            </a>
            <button type="button" data-admin-sidebar-close aria-label="Close navigation"
                    class="grid h-9 w-9 place-items-center rounded-xl border border-white/15 bg-white/5 text-white/80 transition-all duration-300 hover:rotate-90 hover:bg-pga-red hover:text-white lg:hidden">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18" />
                </svg>
            </button>
        </div>

        <nav class="relative flex-1 overflow-y-auto px-4 py-5" aria-label="Admin sections">
            @foreach ($adminNav as $group)
                <p class="mb-3 mt-1 px-3 text-[0.62rem] font-bold uppercase tracking-[0.28em] text-white/40">
                    {{ $group['group'] }}
                </p>
                <ul class="mb-5 space-y-1.5">
                    @foreach ($group['items'] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                               class="admin-link {{ request()->routeIs($item['active']) ? 'is-active' : '' }}">
                                <span class="admin-link-icon">
                                    <svg class="h-[1.1rem] w-[1.1rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                    </svg>
                                </span>
                                <span class="flex-1">{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </nav>

        <div class="relative border-t border-white/10 px-5 py-5">
            <a href="{{ route('home') }}" target="_blank" rel="noopener"
               class="admin-link !px-3">
                <span class="admin-link-icon">
                    <svg class="h-[1.1rem] w-[1.1rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                </span>
                <span class="flex-1">View website</span>
            </a>
        </div>
    </aside>

    {{-- ================= Main column ================= --}}
    <div class="lg:pl-[17.5rem]">
        <header class="admin-topbar">
            <div class="flex items-center justify-between gap-4 px-4 py-3 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3">
                    <button type="button" data-admin-sidebar-open aria-label="Open navigation"
                            class="admin-icon-btn lg:hidden">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div class="leading-tight">
                        <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-pga-muted">Admin Console</p>
                        <p class="font-display text-base font-semibold text-pga-ink">@yield('page-title', 'Dashboard')</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" rel="noopener"
                       class="hidden items-center gap-2 rounded-full border border-pga-green/25 bg-white/60 px-4 py-2 text-sm font-semibold text-pga-green transition-all duration-300 hover:bg-pga-green hover:text-white sm:inline-flex">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18m0 18a9 9 0 0 1 0-18m0 18c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3M3.6 9h16.8M3.6 15h16.8" />
                        </svg>
                        View Site
                    </a>

                    <div class="flex items-center gap-3 rounded-full border border-white/70 bg-white/70 py-1.5 pl-1.5 pr-3.5 shadow-sm backdrop-blur">
                        <span class="grid h-9 w-9 place-items-center rounded-full bg-gradient-to-br from-pga-green to-pga-green-deep font-display text-sm font-semibold text-white">
                            {{ strtoupper(mb_substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </span>
                        <span class="hidden text-left leading-tight sm:block">
                            <span class="block text-xs font-semibold text-pga-ink">{{ auth()->user()->name ?? 'Administrator' }}</span>
                            <span class="block text-[0.65rem] text-pga-muted">Signed in</span>
                        </span>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" aria-label="Log out"
                                class="admin-icon-btn !border-pga-red/25 !text-pga-red-deep hover:!bg-pga-red hover:!text-white">
                            <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main id="admin-content" class="px-4 py-8 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <footer class="px-4 pb-8 pt-2 text-center text-xs text-pga-muted sm:px-6 lg:px-8">
            &copy; {{ date('Y') }} {{ config('app.name', 'Philadelphia Gospel Assembly') }} &middot; Admin Console
        </footer>
    </div>
</body>
</html>
