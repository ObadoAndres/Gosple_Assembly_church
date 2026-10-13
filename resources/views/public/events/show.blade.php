@extends('layouts.public')

@section('title', $event->title . ' | Events | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($event->description ?? 'An event at Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<x-public.page-header
    eyebrow="Event"
    :title="$event->title"
    :subtitle="$event->location"
    image="Community Transformation.jpg" />

<div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="reveal -mt-8 relative z-10">
        <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 rounded-full bg-white/90 px-4 py-2 text-sm font-semibold text-pga-green shadow-soft backdrop-blur transition-all duration-300 hover:gap-3 hover:text-pga-red">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12l7.5-7.5M3 12h18" /></svg>
            Back to Events
        </a>
    </div>

    <article class="reveal clay mt-8 p-7 sm:p-10">
        <div class="grid gap-4 sm:grid-cols-3">
            <div class="clay-panel p-4 text-center">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.18em] text-pga-muted">Date</p>
                <p class="mt-1.5 font-display text-lg font-semibold text-pga-green-deep">{{ $event->starts_at->format('M d, Y') }}</p>
            </div>
            <div class="clay-panel p-4 text-center">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.18em] text-pga-muted">Time</p>
                <p class="mt-1.5 font-display text-lg font-semibold text-pga-green-deep">
                    {{ $event->starts_at->format('g:i A') }}@if ($event->ends_at) &ndash; {{ $event->ends_at->format('g:i A') }}@endif
                </p>
            </div>
            <div class="clay-panel p-4 text-center">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.18em] text-pga-muted">Location</p>
                <p class="mt-1.5 font-display text-base font-semibold text-pga-green-deep">{{ $event->location ?? 'Dodoma, Tanzania' }}</p>
            </div>
        </div>

        @if ($event->description)
            <div class="divider-gold my-8"></div>
            <p class="whitespace-pre-wrap text-base leading-relaxed text-pga-ink/90">{{ $event->description }}</p>
        @endif

        <div class="mt-9 flex flex-wrap gap-3">
            <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
               target="_blank" rel="noopener noreferrer" class="btn btn-primary">Get Directions</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us</a>
        </div>
    </article>

    <div class="pb-20 pt-8 text-center">
        <a href="{{ route('events.index') }}" class="footer-link !text-pga-green">&larr; Back to all events</a>
    </div>
</div>
@endsection

