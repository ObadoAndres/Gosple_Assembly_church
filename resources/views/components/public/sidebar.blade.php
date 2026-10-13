@php
    $sidebarItems = [
        ['label' => 'Home', 'route' => 'home', 'active' => 'home', 'icon' => 'M3 10.5 12 3l9 7.5M5.25 9.75V21h13.5V9.75'],
        ['label' => 'About Us', 'route' => 'about', 'active' => 'about', 'icon' => 'M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z'],
        ['label' => 'Vision & Mission', 'route' => 'vision-mission', 'active' => 'vision-mission', 'icon' => 'M2.25 12S6 5.25 12 5.25 21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Zm9.75 2.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z'],
        ['label' => 'Leadership', 'route' => 'leadership', 'active' => 'leadership', 'icon' => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0v.75H3.75Z'],
        ['label' => 'Service Times', 'route' => 'services', 'active' => 'services', 'icon' => 'M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
        ['label' => 'Sermons', 'route' => 'sermons.index', 'active' => 'sermons.*', 'icon' => 'M12 6.75a6.75 6.75 0 0 0-6.75 6.75v3.75h3.75V13.5H6.75m10.5 3.75H13.5V13.5h3.75m0 3.75v3a3 3 0 0 1-3 3h-3'],
        ['label' => 'Events', 'route' => 'events.index', 'active' => 'events.*', 'icon' => 'M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z'],
        ['label' => 'Ministries', 'route' => 'ministries.index', 'active' => 'ministries.*', 'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72M18 18.72a3 3 0 0 0 .513-5.962M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6 18.72a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1 4.682-2.72M6 18.72a9.094 9.094 0 0 0 3.741-.479'],
        ['label' => 'Giving', 'route' => 'giving', 'active' => 'giving', 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z'],
        ['label' => 'Contact', 'route' => 'contact', 'active' => 'contact', 'icon' => 'M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75'],
    ];
@endphp

<div id="sidebar-overlay" class="sidebar-overlay" aria-hidden="true"></div>

<aside id="site-sidebar" class="sidebar" aria-hidden="true" aria-label="Site navigation panel" role="dialog" aria-modal="true">
    <div class="relative flex h-full flex-col">
        {{-- Header --}}
        <div class="flex items-center justify-between gap-3 border-b border-white/10 px-5 py-5">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-white/95 shadow-lg">
                    <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                         class="h-8 w-8 object-contain" width="360" height="360">
                </span>
                <span class="notranslate leading-tight" translate="no">
                    <span class="block font-display text-base font-semibold text-white">Philadelphia</span>
                    <span class="block text-[0.65rem] font-semibold uppercase tracking-[0.24em] text-pga-gold-soft">
                        Gospel Assembly
                    </span>
                </span>
            </a>
            <button type="button" data-sidebar-close aria-label="Close navigation menu"
                    class="grid h-10 w-10 place-items-center rounded-xl border border-white/15 bg-white/5 text-white/80 transition-all duration-300 hover:rotate-90 hover:bg-pga-red hover:text-white">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18" />
                </svg>
            </button>
        </div>

        {{-- Nav --}}
        <nav class="relative flex-1 overflow-y-auto px-4 py-5" aria-label="Sidebar navigation">
            <p class="mb-3 px-3 text-[0.66rem] font-bold uppercase tracking-[0.28em] text-white/40">Explore</p>
            <ul class="space-y-1.5">
                @foreach ($sidebarItems as $item)
                    <li>
                        <a href="{{ route($item['route']) }}"
                           class="sidebar-link {{ request()->routeIs($item['active']) ? 'is-active' : '' }}">
                            <span class="sidebar-icon">
                                <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                </svg>
                            </span>
                            <span class="flex-1 text-[0.95rem]">{{ $item['label'] }}</span>
                            <svg class="h-4 w-4 text-white/30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Quick contact --}}
            <div class="mt-7 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                <p class="mb-3 text-[0.66rem] font-bold uppercase tracking-[0.28em] text-pga-gold-soft">Visit Us</p>
                <p class="notranslate text-sm leading-relaxed text-white/75" translate="no">
                    RQV2+7QX, Dodoma, Tanzania
                </p>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                   target="_blank" rel="noopener noreferrer"
                   class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-white transition-colors hover:text-pga-gold-soft">
                    Get directions
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </nav>

        {{-- Footer CTA --}}
        <div class="relative border-t border-white/10 px-5 py-5">
            <div class="mb-4 grid grid-cols-2 gap-2.5">
                <a href="{{ route('services') }}#weekly-timetable" class="btn btn-gold !px-3 !py-3 text-sm">Visit Us</a>
                <a href="{{ route('giving') }}" class="btn btn-accent !px-3 !py-3 text-sm">Give Now</a>
            </div>
            <p class="text-center text-[0.7rem] italic text-white/55">
                &ldquo;Philadelphia tunasonga mbele, Bwana yu pamoja nasi.&rdquo;
            </p>
        </div>
    </div>
</aside>
