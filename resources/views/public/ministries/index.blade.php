@extends('layouts.public')

@section('title', 'Ministries | Philadelphia Gospel Assembly')
@section('meta_description', 'The ministries and community development work of Philadelphia Gospel Assembly Tanzania.')

@section('content')
<x-public.page-header
    eyebrow="Get Involved"
    title="Our Ministries"
    subtitle="Find your place. Grow in faith. Serve with love — there is a place for you in the family of God."
    image="Worship & Music Ministry.jpg" />

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    @if ($ministries->count() > 0)
        <div class="grid gap-6 py-16 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($ministries as $ministry)
                <article class="reveal card-premium lift zoom-media group flex h-full flex-col overflow-hidden">
                    @if ($ministry->image_url)
                        <div class="h-52 overflow-hidden">
                            <img src="{{ $ministry->image_url }}" alt="{{ $ministry->name }}" class="h-full w-full object-cover" width="800" height="520" loading="lazy">
                        </div>
                    @endif
                    <div class="flex flex-1 flex-col p-7">
                        <h2 class="font-display text-xl font-semibold text-pga-green-deep">
                            <a href="{{ route('ministries.show', $ministry->slug) }}" class="transition-colors hover:text-pga-red">{{ $ministry->name }}</a>
                        </h2>
                        @if ($ministry->description)
                            <p class="mt-3 flex-1 text-sm leading-relaxed text-pga-muted">{{ Str::limit($ministry->description, 140) }}</p>
                        @endif
                        <a href="{{ route('ministries.show', $ministry->slug) }}" class="footer-link mt-5 !text-pga-red-deep">Learn more &rarr;</a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="py-16">
            @include('components.public.ministry-highlights')
        </div>
    @endif

    {{-- Purpose --}}
    <section aria-labelledby="ministry-purpose-heading" class="pb-16">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="eyebrow eyebrow--center">Why We Serve</p>
            <h2 id="ministry-purpose-heading" class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Our Purpose in Ministry</h2>
            <p class="mt-3 text-pga-muted">We seek to help people grow in Christ, care for one another, and serve our neighbors with faith and compassion.</p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <article class="reveal clay p-7 sm:p-8">
                <h3 class="font-display text-xl font-semibold text-pga-green-deep">Our Objectives</h3>
                <p class="mt-3 text-sm leading-relaxed text-pga-ink/85">Our ministries aim to nurture faith, build a caring church family, develop gifts for service, and share Christ’s love beyond the church.</p>
                <details class="group mt-5">
                    <summary class="footer-link cursor-pointer list-none !text-pga-red-deep">
                        <span class="group-open:hidden">Read More</span>
                        <span class="hidden group-open:inline">Read less</span>
                        <span aria-hidden="true">&rarr;</span>
                    </summary>
                    <ul class="mt-4 space-y-2.5 text-sm leading-relaxed text-pga-ink/85">
                        @foreach ([
                            'Encourage spiritual growth through Scripture, prayer, worship, and fellowship.',
                            'Help children, youth, and adults discover and develop their gifts.',
                            'Strengthen families and build supportive relationships across the church.',
                            'Serve our neighbors and share the hope of the Gospel with compassion.',
                        ] as $point)
                            <li class="flex items-start gap-2.5">
                                <span class="mt-1.5 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-pga-gold"></span>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>
                </details>
            </article>
            <article class="reveal reveal-delay-1 clay p-7 sm:p-8">
                <h3 class="font-display text-xl font-semibold text-pga-green-deep">What We Do</h3>
                <p class="mt-3 text-sm leading-relaxed text-pga-ink/85">We bring people together to learn, worship, pray, encourage one another, and put faith into action in our community.</p>
                <details class="group mt-5">
                    <summary class="footer-link cursor-pointer list-none !text-pga-red-deep">
                        <span class="group-open:hidden">Read More</span>
                        <span class="hidden group-open:inline">Read less</span>
                        <span aria-hidden="true">&rarr;</span>
                    </summary>
                    <ul class="mt-4 space-y-2.5 text-sm leading-relaxed text-pga-ink/85">
                        @foreach ([
                            'Gather for worship, Bible teaching, prayer, and fellowship.',
                            'Create opportunities for families, women, men, youth, and children to connect and grow.',
                            'Use music, outreach, and practical service to contribute to church and community life.',
                            'Help people find a place to participate, serve, and grow together.',
                        ] as $point)
                            <li class="flex items-start gap-2.5">
                                <span class="mt-1.5 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-pga-green"></span>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>
                </details>
            </article>
        </div>

        <div class="reveal mt-10 text-center">
            <p class="text-pga-muted">Discover your gifts. Build relationships. Serve others. Grow together.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary mt-5">Ask how to get involved</a>
        </div>
    </section>

    {{-- Skills --}}
    <section class="pb-20">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="eyebrow eyebrow--center">Community Development</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Skills Training &amp; Community Development</h2>
            <p class="mt-3 text-pga-muted">As part of its community service, the church supports practical skills training that helps young people and families build sustainable livelihoods.</p>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <figure class="reveal card-premium lift zoom-media overflow-hidden">
                <div style="aspect-ratio: 416 / 242;" class="overflow-hidden">
                    <img src="{{ asset('images/capentry%20and%20wooding.png') }}" alt="Carpentry and woodwork skills training"
                         class="h-full w-full object-cover" width="416" height="242" loading="lazy">
                </div>
                <figcaption class="p-6">
                    <h3 class="font-display text-lg font-semibold text-pga-green-deep">Carpentry &amp; Woodwork</h3>
                    <p class="mt-2 text-sm leading-relaxed text-pga-muted">Practical carpentry and woodwork training that equips participants with trade skills for employment and self-employment.</p>
                </figcaption>
            </figure>
            <figure class="reveal reveal-delay-1 card-premium lift zoom-media overflow-hidden">
                <div style="aspect-ratio: 415 / 242;" class="overflow-hidden">
                    <img src="{{ asset('images/Tailor%20and%20sewing.png') }}" alt="Tailoring and sewing skills training"
                         class="h-full w-full object-cover" width="415" height="242" loading="lazy">
                </div>
                <figcaption class="p-6">
                    <h3 class="font-display text-lg font-semibold text-pga-green-deep">Tailoring &amp; Sewing</h3>
                    <p class="mt-2 text-sm leading-relaxed text-pga-muted">Tailoring and sewing training that helps participants develop practical skills for income generation and self-employment.</p>
                </figcaption>
            </figure>
        </div>
    </section>
</div>
@endsection
