@extends('layouts.public')

@section('title', $sermon->title . ' | Sermons | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($sermon->description ?? 'A sermon from Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<x-public.page-header
    eyebrow="Sermon"
    :title="$sermon->title"
    :subtitle="$sermon->scripture_reference"
    image="spiritual development.jpg" />

<div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="reveal -mt-8 relative z-10">
        <a href="{{ route('sermons.index') }}" class="inline-flex items-center gap-2 rounded-full bg-white/90 px-4 py-2 text-sm font-semibold text-pga-green shadow-soft backdrop-blur transition-all duration-300 hover:gap-3 hover:text-pga-red">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12l7.5-7.5M3 12h18" /></svg>
            Back to Sermons
        </a>
    </div>

    <article class="reveal clay mt-8 p-7 sm:p-10">
        <div class="flex flex-wrap gap-2">
            @if ($sermon->category)
                <span class="pill pill-red">{{ $sermon->category }}</span>
            @endif
            @if ($sermon->sermon_date)
                <span class="pill pill-green">{{ $sermon->sermon_date->format('M d, Y') }}</span>
            @endif
        </div>

        <h1 class="mt-5 font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">{{ $sermon->title }}</h1>

        <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-sm text-pga-muted">
            @if ($sermon->scripture_reference)
                <span class="inline-flex items-center gap-1.5 font-medium text-pga-gold-deep">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z" /></svg>
                    {{ $sermon->scripture_reference }}
                </span>
            @endif
            @if ($sermon->preacher)
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0v.75H3.75Z" /></svg>
                    {{ $sermon->preacher }}
                </span>
            @endif
        </div>

        @if ($sermon->description)
            <div class="divider-gold my-7"></div>
            <p class="whitespace-pre-wrap text-base leading-relaxed text-pga-ink/90">{{ $sermon->description }}</p>
        @endif

        @if ($sermon->video_url || $sermon->audio_url)
            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                @if ($sermon->video_url)
                    <a href="{{ $sermon->video_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-accent w-full">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.14v13.72L19 12 8 5.14Z" /></svg>
                        Watch Video
                    </a>
                @endif
                @if ($sermon->audio_url)
                    <a href="{{ $sermon->audio_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary w-full">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" /></svg>
                        Listen to Audio
                    </a>
                @endif
            </div>
        @endif
    </article>

    <div class="pb-20 pt-8 text-center">
        <a href="{{ route('sermons.index') }}" class="footer-link !text-pga-green">&larr; Back to all sermons</a>
    </div>
</div>
@endsection
