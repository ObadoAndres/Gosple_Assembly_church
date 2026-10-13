@extends('layouts.public')

@section('title', 'Events | Philadelphia Gospel Assembly')
@section('meta_description', 'Upcoming and past events at Philadelphia Gospel Assembly Tanzania.')

@section('content')
<x-public.page-header
    eyebrow="Gather With Us"
    title="Church Events"
    subtitle="Gather with us for worship, prayer, fellowship, and spiritual growth. Event dates and times are published here when confirmed."
    image="Community Transformation.jpg" />

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    {{-- Upcoming --}}
    <section aria-labelledby="upcoming-events-heading" class="py-16">
        <div class="reveal flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-pga-green to-pga-green-deep text-white">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" /></svg>
            </span>
            <h2 id="upcoming-events-heading" class="font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Upcoming Events</h2>
        </div>

        @if ($upcoming->count() > 0)
            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($upcoming as $event)
                    <article class="reveal card-premium lift flex h-full flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="grid h-14 w-14 flex-shrink-0 flex-col place-items-center rounded-2xl bg-pga-green text-white shadow-soft">
                                <span class="font-display text-lg font-semibold leading-none">{{ $event->starts_at->format('d') }}</span>
                                <span class="text-[0.6rem] uppercase tracking-wide">{{ $event->starts_at->format('M') }}</span>
                            </span>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-pga-red-deep">{{ $event->starts_at->format('D, g:i A') }}</p>
                                @if ($event->location)
                                    <p class="mt-0.5 text-xs text-pga-muted">{{ $event->location }}</p>
                                @endif
                            </div>
                        </div>
                        <h3 class="mt-5 font-display text-xl font-semibold text-pga-green-deep">
                            <a href="{{ route('events.show', $event->slug) }}" class="transition-colors hover:text-pga-red">{{ $event->title }}</a>
                        </h3>
                        @if ($event->description)
                            <p class="mt-3 flex-1 text-sm leading-relaxed text-pga-muted">{{ Str::limit($event->description, 120) }}</p>
                        @endif
                        <a href="{{ route('events.show', $event->slug) }}" class="footer-link mt-5 !text-pga-red-deep">Learn more &rarr;</a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="reveal clay mt-8 p-8 text-center">
                <p class="text-pga-muted">No upcoming events have been announced. Our regular weekly gatherings are listed in the
                    <a href="{{ route('services') }}" class="font-semibold text-pga-green underline underline-offset-4">church timetable</a>.
                </p>
            </div>
        @endif
    </section>

    {{-- Past --}}
    <section class="pb-20">
        <div class="reveal flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-pga-muted to-pga-green-night text-white">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
            </span>
            <h2 class="font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Past Events</h2>
        </div>

        @if ($past->count() > 0)
            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($past as $event)
                    <article class="reveal lift flex h-full flex-col rounded-3xl border border-white/70 bg-white/60 p-7 backdrop-blur">
                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-pga-muted">{{ $event->starts_at->format('M d, Y') }}</p>
                        <h3 class="mt-3 font-display text-lg font-semibold text-pga-green-deep">
                            <a href="{{ route('events.show', $event->slug) }}" class="transition-colors hover:text-pga-red">{{ $event->title }}</a>
                        </h3>
                        @if ($event->location)
                            <p class="mt-2 flex-1 text-sm text-pga-muted">{{ $event->location }}</p>
                        @endif
                        <a href="{{ route('events.show', $event->slug) }}" class="footer-link mt-4 !text-pga-green">View details &rarr;</a>
                    </article>
                @endforeach
            </div>
            <div class="mt-10">{{ $past->links() }}</div>
        @else
            <div class="reveal clay mt-8 p-10 text-center">
                <p class="text-lg text-pga-muted">No past events to display.</p>
            </div>
        @endif
    </section>
</div>
@endsection

