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
    <div class="mx-auto flex h-[4.5rem] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="Philadelphia Gospel Assembly home">
            <span class="relative grid h-11 w-11 place-items-center rounded-2xl bg-white shadow-[0_10px_24px_-12px_rgba(6,77,43,.7)] ring-1 ring-pga-green/15 transition-transform duration-500 group-hover:scale-105 group-hover:-rotate-3">
                <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                     class="h-9 w-9 object-contain" width="360" height="360">
            </span>
            <span class="flex flex-col leading-none">
                <span class="font-display text-[0.98rem] font-semibold tracking-tight text-pga-green-deep sm:text-lg">
                    Philadelphia <span class="text-pga-red">Gospel</span> Assembly
                </span>
                <span class="mt-0.5 hidden text-[0.62rem] font-semibold uppercase tracking-[0.28em] text-pga-muted sm:block">
                    Dodoma &middot; Tanzania
                </span>
            </span>
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden items-center gap-7 lg:flex" aria-label="Main navigation">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="nav-link {{ request()->routeIs($item['active']) ? 'is-active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-2.5">
            <a href="{{ route('giving') }}" class="btn btn-primary hidden !px-5 !py-2.5 text-sm xl:inline-flex">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6.716-4.297-9.428-9.058C.964 9.293 2.32 5.5 5.84 4.6c2.06-.527 4.06.42 5.16 2.06 1.1-1.64 3.1-2.587 5.16-2.06 3.52.9 4.876 4.693 3.268 7.342C18.716 16.703 12 21 12 21Z" />
                </svg>
                Give
            </a>

            <a href="{{ route('services') }}#weekly-timetable" class="btn btn-outline hidden !px-5 !py-2.5 text-sm md:inline-flex">
                Visit Us
            </a>

            <button type="button" data-sidebar-open aria-expanded="false" aria-controls="site-sidebar"
                    aria-label="Open navigation menu"
                    class="group grid h-11 w-11 place-items-center rounded-2xl bg-white/70 text-pga-green ring-1 ring-pga-green/15 backdrop-blur transition-all duration-[400ms] hover:bg-pga-green hover:text-white hover:shadow-[0_14px_30px_-12px_rgba(6,77,43,.8)]">
                <span class="flex flex-col items-end gap-[5px]">
                    <span class="block h-[2px] w-5 rounded-full bg-current transition-all duration-[400ms] group-hover:w-6"></span>
                    <span class="block h-[2px] w-4 rounded-full bg-current transition-all duration-[400ms] group-hover:w-6"></span>
                    <span class="block h-[2px] w-6 rounded-full bg-current transition-all duration-[400ms]"></span>
                </span>
            </button>
        </div>
    </div>
</header>
