@extends('layouts.public')

@section('title', 'Philadelphia Gospel Assembly | Dodoma, Tanzania')
@section('meta_description', 'Philadelphia Gospel Assembly Tanzania - a Pentecostal Christian church in Dodoma proclaiming the Gospel of Jesus Christ and serving communities with the love of Christ.')

@section('content')
    {{-- ============================= HERO ============================= --}}
    <section class="relative isolate overflow-hidden">
        <img src="{{ asset('images/hero.jpg') }}"
             alt=""
             aria-hidden="true"
             class="absolute inset-0 -z-20 h-full w-full object-cover object-center"
             width="641" height="360"
             fetchpriority="high">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-pga-green-night/92 via-pga-green-deep/85 to-pga-green-night/95" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="blob left-[-4rem] top-[-3rem] h-72 w-72 bg-pga-gold/30"></div>
            <div class="blob bottom-[-5rem] right-[-3rem] h-80 w-80 bg-pga-red/30" style="animation-delay:-6s"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 sm:pb-28 sm:pt-24 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <span class="reveal glass-dark inline-flex items-center gap-2 rounded-full px-4 py-2 text-[0.7rem] font-semibold uppercase tracking-[0.22em] text-pga-gold-soft">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-pga-gold-soft opacity-70"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-pga-gold"></span>
                        </span>
                        Welcome to Philadelphia Gospel Assembly
                    </span>

                    <h1 class="reveal reveal-delay-1 mt-6 font-display text-4xl font-semibold leading-[1.05] text-white sm:text-5xl lg:text-[3.75rem]">
                        Knowing God.
                        <span class="block text-gradient-gold">Growing in Faith.</span>
                        Living His Purpose.
                    </h1>

                    <p class="reveal reveal-delay-2 mt-6 max-w-xl text-lg italic text-white/85">
                        &ldquo;Philadelphia tunasonga mbele, Bwana yu pamoja nasi.&rdquo;
                    </p>
                    <p class="reveal reveal-delay-2 mt-2 max-w-xl text-sm text-white/60">
                        Philadelphia, we move forward &mdash; the Lord is with us.
                    </p>

                    <div class="reveal reveal-delay-3 mt-9 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                        <a href="{{ route('services') }}#weekly-timetable" class="btn btn-accent">
                            Join Us This Sunday
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-ghost-light">Discover Our Story</a>
                    </div>

                    <div class="reveal reveal-delay-4 mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-white/70">
                        <a href="{{ route('sermons.index') }}" class="footer-link !text-white/70">Watch Sermons</a>
                        <span class="h-1 w-1 rounded-full bg-pga-gold" aria-hidden="true"></span>
                        <a href="{{ route('events.index') }}" class="footer-link !text-white/70">See Events</a>
                        <span class="h-1 w-1 rounded-full bg-pga-gold" aria-hidden="true"></span>
                        <span class="inline-flex items-center gap-1.5">
                            <svg class="h-4 w-4 text-pga-gold-soft" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Dodoma, Tanzania
                        </span>
                    </div>
                </div>

                {{-- Glass info panel --}}
                <div class="reveal reveal-delay-3 lg:col-span-5">
                    <div class="glass-dark rounded-3xl p-6 sm:p-7">
                        <p class="eyebrow eyebrow--light">This Sunday</p>
                        <div class="mt-5 space-y-4">
                            <div class="flex items-center justify-between gap-4 border-b border-white/10 pb-4">
                                <span class="text-sm text-white/65">Sunday School</span>
                                <span class="font-display text-lg font-semibold text-white">9:00 &ndash; 10:00 AM</span>
                            </div>
                            <div class="flex items-center justify-between gap-4 border-b border-white/10 pb-4">
                                <span class="text-sm text-white/65">Main Service</span>
                                <span class="font-display text-lg font-semibold text-white">10:00 AM &ndash; 12:00 PM</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-sm text-white/65">Praise &amp; Worship</span>
                                <span class="font-display text-lg font-semibold text-white">4:30 &ndash; 6:00 PM</span>
                            </div>
                        </div>
                        <a href="{{ route('services') }}#weekly-timetable"
                           class="mt-6 flex items-center justify-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition-all duration-[400ms] hover:bg-white hover:text-pga-green">
                            View full timetable
                        </a>
                    </div>

                    <div class="mt-4 grid grid-cols-3 gap-3">
                        <div class="glass-dark rounded-2xl px-3 py-4 text-center">
                            <p class="font-display text-2xl font-semibold text-pga-gold-soft" data-count="1992">0</p>
                            <p class="mt-1 text-[0.62rem] uppercase tracking-[0.16em] text-white/55">Founded</p>
                        </div>
                        <div class="glass-dark rounded-2xl px-3 py-4 text-center">
                            <p class="font-display text-2xl font-semibold text-pga-gold-soft" data-count="6">0</p>
                            <p class="mt-1 text-[0.62rem] uppercase tracking-[0.16em] text-white/55">Nations</p>
                        </div>
                        <div class="glass-dark rounded-2xl px-3 py-4 text-center">
                            <p class="font-display text-2xl font-semibold text-pga-gold-soft" data-count="12">0</p>
                            <p class="mt-1 text-[0.62rem] uppercase tracking-[0.16em] text-white/55">Objectives</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-pga-gold/60 to-transparent"></div>
    </section>

    {{-- ============================= WELCOME ============================= --}}
    <section id="about" class="relative py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div class="reveal relative">
                    <div class="zoom-media overflow-hidden rounded-3xl border border-white/70 shadow-soft">
                        <img src="{{ asset('images/pjiladelphia full gospel assembly.jpg') }}"
                             alt="Philadelphia Full Gospel Assembly church gathering"
                             class="h-80 w-full object-cover object-center sm:h-[470px]"
                             width="1200" height="800" loading="lazy">
                    </div>
                    <div class="clay absolute -bottom-6 right-4 hidden max-w-[15rem] p-5 sm:block">
                        <p class="font-display text-3xl font-semibold text-pga-green">1992</p>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.18em] text-pga-muted">
                            Registered in Tanzania
                        </p>
                    </div>
                    <div class="clay absolute -left-5 -top-5 hidden h-20 w-20 place-items-center sm:grid">
                        <svg class="h-9 w-9 text-pga-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6.716-4.297-9.428-9.058C.964 9.293 2.32 5.5 5.84 4.6c2.06-.527 4.06.42 5.16 2.06 1.1-1.64 3.1-2.587 5.16-2.06 3.52.9 4.876 4.693 3.268 7.342C18.716 16.703 12 21 12 21Z" />
                        </svg>
                    </div>
                </div>

                <div class="reveal reveal-delay-1">
                    <p class="eyebrow">Welcome Home</p>
                    <h2 class="mt-4 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">
                        A church family built on the love of Christ
                    </h2>
                    <p class="mt-4 text-lg italic text-pga-green">&ldquo;The fear of the LORD is the beginning of knowledge...&rdquo; &mdash; Proverbs 1:7</p>
                    <div class="prose-pga mt-5">
                        <p>Our desire is to help people know God, grow in His Word, experience His presence, and live out their faith with purpose. Through worship, prayer, biblical teaching, fellowship, and service, we seek to build a community where every person can encounter Jesus Christ and discover their God-given purpose.</p>
                        <p>Whether you are visiting for the first time or looking for a church family to call home, you are welcome here.</p>
                    </div>
                    <p class="mt-6 font-display text-2xl font-semibold text-pga-green">You belong here.</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('about') }}" class="btn btn-primary">Learn About Us</a>
                        <a href="{{ route('ministries.index') }}" class="btn btn-outline">Find a Ministry</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================= SERVICE TIMES & LOCATION ============================= --}}
    <section id="services" class="relative py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-2xl text-center">
                <p class="eyebrow eyebrow--center">Plan Your Visit</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">Service Times &amp; Location</h2>
                <p class="mt-3 text-pga-muted">Come as you are. We look forward to welcoming you and your family.</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-2">
                <div class="reveal clay p-7 sm:p-8">
                    <div class="flex items-center gap-3">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-pga-green text-white shadow-soft">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </span>
                        <h3 class="font-display text-xl font-semibold text-pga-green-deep">Sunday Worship</h3>
                    </div>
                    <div class="mt-6 space-y-3">
                        <div class="flex items-center justify-between gap-4 border-b border-pga-sand pb-3">
                            <span class="text-sm text-pga-muted">Sunday School</span>
                            <span class="font-semibold text-pga-green">9:00 &ndash; 10:00 AM</span>
                        </div>
                        <div class="flex items-center justify-between gap-4 border-b border-pga-sand pb-3">
                            <span class="text-sm text-pga-muted">Main Service</span>
                            <span class="font-semibold text-pga-green">10:00 AM &ndash; 12:00 PM</span>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-pga-muted">Praise &amp; Worship</span>
                            <span class="font-semibold text-pga-green">4:30 &ndash; 6:00 PM</span>
                        </div>
                    </div>
                    <a href="{{ route('services') }}#weekly-timetable" class="footer-link mt-6 !text-pga-green">View the full weekly timetable</a>
                </div>

                <div class="reveal reveal-delay-1 clay overflow-hidden p-0">
                    <div class="zoom-media h-44 w-full overflow-hidden">
                        <iframe
                            title="Map showing Philadelphia Gospel Assembly, Dodoma"
                            src="https://www.google.com/maps?q=RQV2%2B7QX%20Dodoma%20Tanzania&amp;z=14&amp;output=embed"
                            class="h-full w-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;"></iframe>
                    </div>
                    <div class="p-7">
                        <div class="flex items-center gap-3">
                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-pga-red text-white shadow-soft">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </span>
                            <h3 class="font-display text-xl font-semibold text-pga-green-deep">Find Us</h3>
                        </div>
                        <p class="mt-4 text-sm text-pga-muted">Philadelphia Gospel Assembly</p>
                        <p class="text-sm text-pga-muted">RQV2+7QX, Dodoma, Tanzania</p>
                        <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                           target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-5">Get Directions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================= ANNOUNCEMENT ============================= --}}
    @if (!empty($latestAnnouncement))
        <section class="relative pb-4">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="reveal clay-green flex flex-col items-start gap-4 p-6 sm:flex-row sm:items-center sm:p-7">
                    <span class="grid h-12 w-12 flex-shrink-0 place-items-center rounded-2xl bg-white/15 text-pga-gold-soft">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                        </svg>
                    </span>
                    <div class="flex-1">
                        <p class="text-[0.66rem] font-bold uppercase tracking-[0.24em] text-pga-gold-soft">Church Announcement</p>
                        <h3 class="mt-1 font-display text-xl font-semibold text-white">{{ $latestAnnouncement->title }}</h3>
                        @if ($latestAnnouncement->content)
                            <p class="mt-1 text-sm text-white/75">{{ Str::limit(strip_tags($latestAnnouncement->content), 160) }}</p>
                        @endif
                    </div>
                    <a href="{{ route('events.index') }}" class="btn btn-gold whitespace-nowrap">See What&rsquo;s On</a>
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= EVENTS ============================= --}}
    <section id="events" class="relative py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="eyebrow">Gather With Us</p>
                    <h2 class="mt-4 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">Upcoming Gatherings</h2>
                    <p class="mt-3 max-w-2xl text-pga-muted">There is always a place to gather for worship, prayer, fellowship, and spiritual growth.</p>
                </div>
                <a href="{{ route('events.index') }}" class="btn btn-outline whitespace-nowrap">All Events</a>
            </div>

            @if ($upcomingEvents->count() > 0)
                <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($upcomingEvents as $event)
                        <article class="reveal card-premium lift flex h-full flex-col p-7">
                            <div class="flex items-center gap-3">
                                <span class="grid h-14 w-14 flex-shrink-0 flex-col place-items-center rounded-2xl bg-pga-green text-white shadow-soft">
                                    <span class="font-display text-lg font-semibold leading-none">{{ $event->starts_at->format('d') }}</span>
                                    <span class="text-[0.6rem] uppercase tracking-wide">{{ $event->starts_at->format('M') }}</span>
                                </span>
                                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-pga-red-deep">
                                    {{ $event->starts_at->format('D, g:i A') }}
                                </p>
                            </div>
                            <h3 class="mt-5 font-display text-xl font-semibold text-pga-green-deep">
                                <a href="{{ route('events.show', $event->slug) }}" class="transition-colors hover:text-pga-red">{{ $event->title }}</a>
                            </h3>
                            @if ($event->description)
                                <p class="mt-3 flex-1 text-sm leading-relaxed text-pga-muted">{{ Str::limit($event->description, 110) }}</p>
                            @endif
                            <a href="{{ route('events.show', $event->slug) }}" class="footer-link mt-5 !text-pga-red-deep">Read More &rarr;</a>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="reveal clay mt-12 p-8 text-center">
                    <p class="text-pga-muted">No upcoming events have been announced. Join us for a regular service using the published
                        <a href="{{ route('services') }}" class="font-semibold text-pga-green underline underline-offset-4">weekly timetable</a>.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- ============================= MINISTRIES ============================= --}}
    <section id="ministries" class="relative py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-2xl text-center">
                <p class="eyebrow eyebrow--center">Get Involved</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">Our Ministries</h2>
                <p class="mt-3 text-pga-muted">Find your place. Grow in faith. Serve with love.</p>
            </div>

            <div class="mt-12">
                @if ($ministries->isNotEmpty())
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($ministries as $ministry)
                            <article class="reveal card-premium lift zoom-media group h-full overflow-hidden">
                                @if ($ministry->image_url)
                                    <div class="h-56 overflow-hidden">
                                        <img src="{{ $ministry->image_url }}" alt="{{ $ministry->name }}" class="h-full w-full object-cover" width="800" height="520" loading="lazy">
                                    </div>
                                @endif
                                <div class="p-7">
                                    <h3 class="font-display text-xl font-semibold text-pga-green-deep">{{ $ministry->name }}</h3>
                                    @if ($ministry->description)
                                        <p class="mt-2 text-sm leading-relaxed text-pga-muted">{{ Str::limit($ministry->description, 130) }}</p>
                                    @endif
                                    <a href="{{ route('ministries.show', $ministry->slug) }}" class="footer-link mt-5 !text-pga-red-deep">Read More &rarr;</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    @include('components.public.ministry-highlights', ['limit' => 3])
                @endif
            </div>

            <div class="reveal mt-10 text-center">
                <a href="{{ route('ministries.index') }}" class="btn btn-outline">Explore All Ministries</a>
            </div>
        </div>
    </section>

    {{-- ============================= SERMONS ============================= --}}
    <section id="sermons" class="relative py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-2xl text-center">
                <p class="eyebrow eyebrow--center">The Word</p>
                <h2 class="mt-4 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">Grow in God&rsquo;s Word</h2>
                <p class="mt-3 text-pga-muted">Be encouraged and strengthened through biblical teaching.</p>
            </div>

            @if ($latestSermon)
                <div class="reveal reveal-delay-1 clay mx-auto mt-12 max-w-4xl p-7 sm:p-10">
                    <span class="pill pill-red">Latest Message</span>
                    <h3 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">{{ $latestSermon->title }}</h3>
                    @if ($latestSermon->scripture_reference)
                        <p class="mt-2 inline-flex items-center gap-2 text-pga-gold-deep">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z" />
                            </svg>
                            {{ $latestSermon->scripture_reference }}
                        </p>
                    @endif
                    @if ($latestSermon->description)
                        <p class="mt-4 leading-relaxed text-pga-ink/85">{{ Str::limit($latestSermon->description, 260) }}</p>
                    @endif
                    <div class="mt-7 flex flex-wrap gap-3">
                        @if ($latestSermon->safe_video_url)
                            <a href="{{ $latestSermon->safe_video_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-accent">Watch Sermon</a>
                        @endif
                        @if ($latestSermon->safe_audio_url)
                            <a href="{{ $latestSermon->safe_audio_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline">Listen</a>
                        @endif
                        <a href="{{ route('sermons.show', $latestSermon->slug) }}" class="btn btn-primary">Message Details</a>
                    </div>
                </div>
            @else
                <div class="reveal clay mx-auto mt-12 max-w-3xl p-8 text-center">
                    <p class="text-pga-muted">No sermons have been published yet. Please check back for messages from the church.</p>
                </div>
            @endif

            <div class="reveal mt-10 text-center">
                <a href="{{ route('sermons.index') }}" class="footer-link !text-pga-green">Explore our sermon library &rarr;</a>
            </div>
        </div>
    </section>

    {{-- ============================= GIVING CTA ============================= --}}
    <section id="giving" class="relative py-4 sm:py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal clay-green relative overflow-hidden p-8 text-center sm:p-14">
                <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                    <div class="blob left-[-3rem] top-[-3rem] h-56 w-56 bg-pga-gold/30"></div>
                    <div class="blob bottom-[-4rem] right-[-2rem] h-60 w-60 bg-pga-red/30" style="animation-delay:-5s"></div>
                </div>
                <div class="relative">
                    <p class="eyebrow eyebrow--light eyebrow--center">Give &amp; Make a Difference</p>
                    <h2 class="mx-auto mt-4 max-w-2xl font-display text-3xl font-semibold sm:text-4xl">
                        Your generosity helps share <span class="text-gradient-gold">God&rsquo;s Word</span>
                    </h2>
                    <p class="mx-auto mt-4 max-w-2xl italic text-white/80">
                        &ldquo;Each of you should give what you have decided in your heart to give...&rdquo; &mdash; 2 Corinthians 9:7
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <a href="{{ route('giving') }}" class="btn btn-accent">Learn About Giving</a>
                        <a href="{{ route('contact') }}" class="btn btn-ghost-light">Talk to Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

