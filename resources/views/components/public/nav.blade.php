@php
    $navItems = [
        ['label' => 'Home', 'route' => 'home', 'active' => 'home'],
        ['label' => 'About', 'route' => 'about', 'active' => 'about'],
        ['label' => 'Services', 'route' => 'services', 'active' => 'services'],
        ['label' => 'Sermons', 'route' => 'sermons.index', 'active' => 'sermons.*'],
        ['label' => 'Events', 'route' => 'events.index', 'active' => 'events.*'],
        ['label' => 'Ministries', 'route' => 'ministries.index', 'active' => 'ministries.*'],
        ['label' => 'Contact', 'route' => 'contact', 'active' => 'contact'],
    ];
@endphp

<header id="site-header" class="site-header sticky top-0 z-50">
    <div class="nav-shell mx-auto flex max-w-7xl items-center justify-between gap-2 px-4 sm:gap-4 sm:px-6 lg:px-8">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="group flex min-w-0 items-center gap-2 sm:gap-3" aria-label="Philadelphia Gospel Assembly home">
            <span class="relative grid h-11 w-11 flex-shrink-0 place-items-center rounded-2xl bg-white shadow-[0_10px_24px_-12px_rgba(6,77,43,.7)] ring-1 ring-pga-green/15 transition-all duration-500 group-hover:scale-105 group-hover:-rotate-3 group-hover:ring-pga-gold/50 group-hover:shadow-[0_14px_30px_-12px_rgba(201,162,39,.65)]">
                <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                     class="h-9 w-9 object-contain" width="360" height="360">
            </span>
            <span class="notranslate flex min-w-0 flex-col leading-none" translate="no">
                <span class="block whitespace-normal break-words font-display text-[0.98rem] font-semibold leading-tight tracking-tight text-pga-green-deep sm:text-lg">
                    Philadelphia <span class="text-pga-red">Gospel</span> Assembly
                </span>
                <span class="mt-0.5 hidden text-[0.62rem] font-semibold uppercase tracking-[0.28em] text-pga-muted sm:block">
                    Dodoma &middot; Tanzania
                </span>
            </span>
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden min-w-0 flex-wrap items-center justify-center gap-x-3 lg:flex xl:gap-x-4" aria-label="Main navigation">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="nav-link text-center leading-tight {{ request()->routeIs($item['active']) ? 'is-active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-2.5">
            <span class="nav-divider hidden lg:block" aria-hidden="true"></span>
            <button id="language-switch" type="button" data-target-language="sw" disabled
                    translate="no"
                    aria-label="Translate this website to Kiswahili"
                    class="language-switch notranslate"
                    title="Change website language">
                <svg class="language-switch__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 8.25 3 3m-4.5 0 4.5-4.5m-3.75 7.5h4.5M14.25 5.25h6m-3-3v3m-3 2.25a12.75 12.75 0 0 1-3 6.75m3-6.75c.75 2.25 2.25 4.5 4.5 6m-7.5.75c1.5-.75 2.75-2 3.75-3.75" />
                </svg>
                <span class="language-switch__code" data-language-code>SW</span>
                <span class="language-switch__label" data-language-label>Kiswahili</span>
            </button>
            <div id="google_translate_element" class="sr-only" aria-hidden="true"></div>

            <a href="{{ route('giving') }}" class="btn btn-primary hidden h-11 !px-5 text-sm xl:inline-flex">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6.716-4.297-9.428-9.058C.964 9.293 2.32 5.5 5.84 4.6c2.06-.527 4.06.42 5.16 2.06 1.1-1.64 3.1-2.587 5.16-2.06 3.52.9 4.876 4.693 3.268 7.342C18.716 16.703 12 21 12 21Z" />
                </svg>
                Give
            </a>

            <a href="{{ route('services') }}#weekly-timetable" class="btn btn-outline hidden h-11 !px-5 text-sm md:inline-flex">
                Visit Us
            </a>

            <button type="button" data-sidebar-open aria-expanded="false" aria-controls="site-sidebar"
                    aria-label="Open navigation menu"
                    class="nav-burger group grid h-11 w-11 place-items-center rounded-2xl bg-white/70 text-pga-green ring-1 ring-pga-green/15 backdrop-blur transition-all duration-[400ms] hover:bg-pga-green hover:text-white hover:ring-pga-green hover:shadow-[0_14px_30px_-12px_rgba(6,77,43,.8)]">
                <span class="flex flex-col items-end gap-[5px]">
                    <span class="block h-[2px] w-5 rounded-full bg-current transition-all duration-[400ms] group-hover:w-6"></span>
                    <span class="block h-[2px] w-4 rounded-full bg-current transition-all duration-[400ms] group-hover:w-6"></span>
                    <span class="block h-[2px] w-6 rounded-full bg-current transition-all duration-[400ms]"></span>
                </span>
            </button>
        </div>
    </div>
</header>
