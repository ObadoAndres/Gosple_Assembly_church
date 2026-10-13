@extends('layouts.public')

@section('title', 'Vision, Mission & Statement of Faith | Philadelphia Gospel Assembly')
@section('meta_description', 'The vision, mission, and statement of faith of Philadelphia Gospel Assembly Tanzania.')

@php
    $missionPoints = [
        'Preach the Gospel of Jesus Christ.',
        'Establish and strengthen churches.',
        'Develop spiritually mature Christian believers.',
        'Train and equip Christian leaders and ministers.',
        'Build the Body of Christ spiritually, physically, and intellectually.',
        'Extend the Gospel to different nations and communities.',
        'Support widows, orphans, and disadvantaged people.',
        'Empower young people through practical skills and self-employment initiatives.',
    ];
    $faithPoints = [
        'Faith in Jesus Christ.',
        'The authority of the Holy Scriptures.',
        'Prayer and worship.',
        'The work of the Holy Spirit.',
        'Evangelism and missionary work.',
        'Christian discipleship.',
        'Development of the Body of Christ.',
        'Service to communities and people in need.',
    ];
@endphp

@section('content')
<x-public.page-header
    eyebrow="Our Foundation"
    title="Vision, Mission & Statement of Faith"
    subtitle="The convictions that shape our worship, our witness, and our service."
    image="spiritual development.jpg" />

<div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <div class="-mt-10 grid gap-6 md:grid-cols-3">
        @php
            $cards = [
                ['icon' => 'eye', 'label' => 'Vision', 'text' => 'A strong and united Body of Christ transforming nations.'],
                ['icon' => 'flag', 'label' => 'Mission', 'text' => 'Eight commitments that guide our service.'],
                ['icon' => 'book', 'label' => 'Faith', 'text' => 'Eight foundations of what we believe and practise.'],
            ];
        @endphp
        @foreach ($cards as $card)
            <div class="reveal clay relative z-10 p-6 text-center">
                <span class="mx-auto grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-pga-green to-pga-green-deep text-white shadow-soft">
                    @if ($card['icon'] === 'eye')
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12S6 5.25 12 5.25 21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Zm9.75 2.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"/></svg>
                    @elseif ($card['icon'] === 'flag')
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18M3 4.5h12l-1.5 3 1.5 3H3"/></svg>
                    @else
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z"/></svg>
                    @endif
                </span>
                <h3 class="mt-4 font-display text-lg font-semibold text-pga-green-deep">{{ $card['label'] }}</h3>
                <p class="mt-2 text-sm text-pga-muted">{{ $card['text'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Vision --}}
    <section class="reveal py-16">
        <div class="flex items-center gap-3">
            <span class="h-px flex-1 bg-gradient-to-r from-transparent to-pga-gold/60"></span>
            <p class="eyebrow">Our Vision</p>
            <span class="h-px flex-1 bg-gradient-to-l from-transparent to-pga-gold/60"></span>
        </div>
        <div class="clay-green relative mt-8 overflow-hidden p-8 text-center sm:p-12">
            <div class="blob left-[-3rem] top-[-3rem] h-52 w-52 bg-pga-gold/25"></div>
            <div class="blob bottom-[-3rem] right-[-2rem] h-56 w-56 bg-pga-red/25" style="animation-delay:-5s"></div>
            <svg class="relative mx-auto h-10 w-10 text-pga-gold-soft" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12S6 5.25 12 5.25 21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Zm9.75 2.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
            </svg>
            <p class="relative mt-5 font-display text-2xl font-medium leading-snug text-white sm:text-3xl">
                To build a strong and united Body of Christ that transforms individuals, families,
                communities, and nations through the Gospel of Jesus Christ.
            </p>
        </div>
    </section>

    {{-- Mission --}}
    <section class="reveal pb-16">
        <div class="flex items-center gap-3">
            <span class="h-px flex-1 bg-gradient-to-r from-transparent to-pga-red/50"></span>
            <p class="eyebrow">Our Mission</p>
            <span class="h-px flex-1 bg-gradient-to-l from-transparent to-pga-red/50"></span>
        </div>
        <div class="mt-8 grid gap-4 sm:grid-cols-2">
            @foreach ($missionPoints as $index => $point)
                <div class="reveal clay-panel flex items-start gap-4 p-5" style="transition-delay: {{ $index * 0.04 }}s">
                    <span class="grid h-8 w-8 flex-shrink-0 place-items-center rounded-xl bg-gradient-to-br from-pga-red to-pga-red-deep font-display text-sm font-semibold text-white">{{ $index + 1 }}</span>
                    <p class="pt-1 text-sm leading-relaxed text-pga-ink/90">{{ $point }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Faith --}}
    <section class="reveal pb-20">
        <div class="flex items-center gap-3">
            <span class="h-px flex-1 bg-gradient-to-r from-transparent to-pga-gold/60"></span>
            <p class="eyebrow">Statement of Faith</p>
            <span class="h-px flex-1 bg-gradient-to-l from-transparent to-pga-gold/60"></span>
        </div>
        <div class="mt-8 grid gap-4 sm:grid-cols-2">
            @foreach ($faithPoints as $index => $point)
                <div class="reveal clay-panel flex items-start gap-4 p-5" style="transition-delay: {{ $index * 0.04 }}s">
                    <span class="mt-0.5 grid h-8 w-8 flex-shrink-0 place-items-center rounded-xl bg-gradient-to-br from-pga-gold-soft to-pga-gold-deep text-pga-green-night">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </span>
                    <p class="pt-1 text-sm leading-relaxed text-pga-ink/90">{{ $point }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <div class="reveal pb-20 text-center">
        <div class="clay inline-flex flex-col items-center gap-4 p-8">
            <p class="font-display text-lg font-semibold text-pga-green-deep">Have questions about our faith?</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
        </div>
    </div>
</div>
@endsection
