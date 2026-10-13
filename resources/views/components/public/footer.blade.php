@php
    $year = date('Y');
    $footerLinks = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About Us', 'route' => 'about'],
        ['label' => 'Vision & Mission', 'route' => 'vision-mission'],
        ['label' => 'Leadership', 'route' => 'leadership'],
        ['label' => 'Sermons', 'route' => 'sermons.index'],
        ['label' => 'Events', 'route' => 'events.index'],
        ['label' => 'Ministries', 'route' => 'ministries.index'],
        ['label' => 'Giving', 'route' => 'giving'],
    ];
    $contactChips = [
        [
            'label' => 'Location',
            'value' => 'RQV2+7QX, Dodoma, Tanzania',
            'href' => 'https://www.google.com/maps/search/?api=1&query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania',
            'external' => true,
            'icon' => 'M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z',
        ],
        [
            'label' => 'Phone',
            'value' => '+255 757 452 410',
            'href' => 'tel:+255757452410',
            'external' => false,
            'icon' => 'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.517-.349-.967-.849-1.092l-5.068-1.267a1.125 1.125 0 0 0-1.217.457l-.663.995a12.042 12.042 0 0 1-5.122-5.122l.995-.663c.4-.267.583-.756.457-1.217L8.523 5.1A1.125 1.125 0 0 0 7.43 4.25H6.06A2.25 2.25 0 0 0 3.81 6.5',
        ],
        [
            'label' => 'Phone',
            'value' => '+255 784 993 496',
            'href' => 'tel:+255784993496',
            'external' => false,
            'icon' => 'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.517-.349-.967-.849-1.092l-5.068-1.267a1.125 1.125 0 0 0-1.217.457l-.663.995a12.042 12.042 0 0 1-5.122-5.122l.995-.663c.4-.267.583-.756.457-1.217L8.523 5.1A1.125 1.125 0 0 0 7.43 4.25H6.06A2.25 2.25 0 0 0 3.81 6.5',
        ],
        [
            'label' => 'Phone',
            'value' => '+255 784 925 922',
            'href' => 'tel:+255784925922',
            'external' => false,
            'icon' => 'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.517-.349-.967-.849-1.092l-5.068-1.267a1.125 1.125 0 0 0-1.217.457l-.663.995a12.042 12.042 0 0 1-5.122-5.122l.995-.663c.4-.267.583-.756.457-1.217L8.523 5.1A1.125 1.125 0 0 0 7.43 4.25H6.06A2.25 2.25 0 0 0 3.81 6.5',
        ],
        [
            'label' => 'Email',
            'value' => 'philadeliphiagospelassembly@gmail.com',
            'href' => 'mailto:philadeliphiagospelassembly@gmail.com',
            'external' => false,
            'icon' => 'M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75',
        ],
    ];
@endphp

<footer class="relative mt-24 overflow-hidden bg-pga-green-night text-white" id="contact-footer">
    {{-- Decorative background --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-br from-pga-green-deep via-pga-green-night to-[#011a0e]"></div>
        <div class="blob left-[-6rem] top-[-4rem] h-72 w-72 bg-pga-green-soft/40"></div>
        <div class="blob right-[-5rem] top-24 h-72 w-72 bg-pga-red/25" style="animation-delay:-4s"></div>
        <div class="blob bottom-[-6rem] left-1/3 h-72 w-72 bg-pga-gold/20" style="animation-delay:-8s"></div>
    </div>
    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-pga-gold/70 to-transparent"></div>

    {{-- Visit CTA band --}}
    <div class="relative mx-auto max-w-7xl px-4 pt-16 sm:px-6 lg:px-8">
        <div class="reveal glass-dark flex flex-col items-center gap-6 rounded-3xl px-6 py-8 text-center sm:px-10 md:flex-row md:justify-between md:text-left">
            <div>
                <p class="eyebrow eyebrow--light">Plan Your Visit</p>
                <h2 class="mt-3 font-display text-2xl font-semibold sm:text-3xl">
                    There is a place for you at <span class="text-gradient-gold">Philadelphia</span>
                </h2>
                <p class="mt-2 max-w-xl text-sm text-white/70">
                    Join us this Sunday in Dodoma &mdash; come as you are, and grow with us in the knowledge of God.
                </p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('services') }}#weekly-timetable" class="btn btn-gold whitespace-nowrap">Service Times</a>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                   target="_blank" rel="noopener noreferrer" class="btn btn-ghost-light whitespace-nowrap">
                    Get Directions
                </a>
            </div>
        </div>
    </div>

    {{-- Main footer --}}
    <div class="relative mx-auto max-w-7xl px-4 pb-10 pt-14 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">
            {{-- Brand --}}
            <div class="reveal lg:col-span-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <span class="grid h-14 w-14 place-items-center rounded-2xl bg-white shadow-lg ring-1 ring-pga-gold/40">
                        <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo"
                             class="h-11 w-11 object-contain" width="360" height="360">
                    </span>
                    <span class="leading-tight">
                        <span class="block font-display text-lg font-semibold">Philadelphia Gospel Assembly</span>
                        <span class="text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-pga-gold-soft">
                            Dodoma &middot; Tanzania
                        </span>
                    </span>
                </a>
                <p class="mt-5 text-sm text-white/70">
                    Knowing God. Growing in Faith. Living His Purpose.
                </p>
                <p class="mt-3 text-sm italic text-pga-gold-soft/90">
                    &ldquo;Philadelphia tunasonga mbele, Bwana yu pamoja nasi.&rdquo;
                </p>
                <p class="mt-2 text-xs text-white/50">Philadelphia, we move forward &mdash; the Lord is with us.</p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="mailto:philadeliphiagospelassembly@gmail.com" class="social-btn" aria-label="Email us">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </a>
                    <a href="tel:+255757452410" class="social-btn" aria-label="Call us">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.517-.349-.967-.849-1.092l-5.068-1.267a1.125 1.125 0 0 0-1.217.457l-.663.995a12.042 12.042 0 0 1-5.122-5.122l.995-.663c.4-.267.583-.756.457-1.217L8.523 5.1A1.125 1.125 0 0 0 7.43 4.25H6.06A2.25 2.25 0 0 0 3.81 6.5" />
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="social-btn" aria-label="Contact page">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm3.75 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm3.75 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM21 12c0 4.556-4.03 8.25-9 8.25a9.76 9.76 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick links --}}
            <div class="reveal reveal-delay-1 lg:col-span-2">
                <h3 class="font-display text-base font-semibold text-white">Explore</h3>
                <div class="mt-2 h-px w-10 bg-pga-gold/60"></div>
                <ul class="mt-5 space-y-3">
                    @foreach ($footerLinks as $link)
                        <li>
                            <a href="{{ route($link['route']) }}" class="footer-link">{{ $link['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Service times --}}
            <div class="reveal reveal-delay-2 lg:col-span-3">
                <h3 class="font-display text-base font-semibold text-white">Sunday Gatherings</h3>
                <div class="mt-2 h-px w-10 bg-pga-gold/60"></div>
                <ul class="mt-5 space-y-3 text-sm">
                    <li class="flex items-center justify-between gap-4 border-b border-white/10 pb-3">
                        <span class="text-white/65">Sunday School</span>
                        <span class="font-semibold text-pga-gold-soft">9:00 &ndash; 10:00 AM</span>
                    </li>
                    <li class="flex items-center justify-between gap-4 border-b border-white/10 pb-3">
                        <span class="text-white/65">Main Service</span>
                        <span class="font-semibold text-pga-gold-soft">10:00 AM &ndash; 12:00 PM</span>
                    </li>
                    <li class="flex items-center justify-between gap-4">
                        <span class="text-white/65">Praise &amp; Worship</span>
                        <span class="font-semibold text-pga-gold-soft">4:30 &ndash; 6:00 PM</span>
                    </li>
                </ul>
                <a href="{{ route('services') }}#weekly-timetable" class="footer-link mt-5">
                    Full weekly timetable &rarr;
                </a>
            </div>

            {{-- Contact + map --}}
            <div class="reveal reveal-delay-3 lg:col-span-3">
                <h3 class="font-display text-base font-semibold text-white">Get in Touch</h3>
                <div class="mt-2 h-px w-10 bg-pga-gold/60"></div>

                <div class="mt-5 space-y-3">
                    @foreach ($contactChips as $chip)
                        <a href="{{ $chip['href'] }}"
                           @if ($chip['external']) target="_blank" rel="noopener noreferrer" @endif
                           class="contact-chip">
                            <span class="chip-icon">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $chip['icon'] }}" />
                                </svg>
                            </span>
                            <span class="min-w-0">
                                <span class="block text-[0.66rem] font-bold uppercase tracking-[0.18em] text-white/45">{{ $chip['label'] }}</span>
                                <span class="block truncate text-sm text-white/85">{{ $chip['value'] }}</span>
                            </span>
                        </a>
                    @endforeach
                </div>

                {{-- Map with directions --}}
                <div class="mt-5 overflow-hidden rounded-2xl border border-white/12 bg-white/5">
                    <iframe
                        title="Map showing Philadelphia Gospel Assembly, Dodoma"
                        src="https://www.google.com/maps?q=RQV2%2B7QX%20Dodoma%20Tanzania&amp;z=15&amp;output=embed"
                        class="h-40 w-full grayscale-[35%] transition-all duration-700 hover:grayscale-0"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;"></iframe>
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center justify-center gap-2 bg-pga-green/80 px-4 py-3 text-sm font-semibold text-white transition-colors hover:bg-pga-red">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 6.75 6 3 6-3v10.5l-6 3-6-3-6 3V9.75l6-3Zm0 0v10.5m6-7.5v10.5" />
                        </svg>
                        Open directions in Maps
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="mt-12 flex flex-col items-center gap-4 border-t border-white/10 pt-6 text-center sm:flex-row sm:justify-between sm:text-left">
            <p class="text-xs text-white/55">
                &copy; {{ $year }} Philadelphia Gospel Assembly Tanzania. All rights reserved.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs">
                <span class="text-white/40">Founded 1992 &middot; Registered in Tanzania</span>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 font-semibold text-pga-gold-soft transition-colors hover:text-white">
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    Admin Login
                </a>
                <span class="text-white/35">
                    Crafted with
                    <span class="text-pga-red" aria-hidden="true">&hearts;</span>
                    by <span class="font-semibold text-white/60">PGA Digital</span>
                </span>
            </div>
        </div>
    </div>
</footer>
