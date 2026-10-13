@extends('layouts.public')

@section('title', $ministry->name . ' | Ministries | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($ministry->description ?? 'A ministry of Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<x-public.page-header
    eyebrow="Ministry"
    :title="$ministry->name"
    subtitle="A place to grow in faith, build relationships, and serve with love."
    image="Worship & Music Ministry.jpg" />

<div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="reveal -mt-8 relative z-10">
        <a href="{{ route('ministries.index') }}" class="inline-flex items-center gap-2 rounded-full bg-white/90 px-4 py-2 text-sm font-semibold text-pga-green shadow-soft backdrop-blur transition-all duration-300 hover:gap-3 hover:text-pga-red">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12l7.5-7.5M3 12h18" /></svg>
            Back to Ministries
        </a>
    </div>

    <article class="reveal clay mt-8 overflow-hidden p-0">
        @if ($ministry->image_url)
            <div class="h-72 w-full overflow-hidden sm:h-80">
                <img src="{{ $ministry->image_url }}" alt="{{ $ministry->name }}" class="h-full w-full object-cover" width="1200" height="640" loading="lazy">
            </div>
        @endif
        <div class="p-7 sm:p-10">
            <h1 class="font-display text-3xl font-semibold text-pga-green-deep sm:text-4xl">{{ $ministry->name }}</h1>
            @if ($ministry->description)
                <div class="divider-gold my-7"></div>
                <p class="whitespace-pre-wrap text-base leading-relaxed text-pga-ink/90">{{ $ministry->description }}</p>
            @endif

            <div class="mt-9 flex flex-wrap gap-3">
                <a href="{{ route('contact') }}" class="btn btn-primary">Get Involved</a>
                <a href="{{ route('ministries.index') }}" class="btn btn-outline">All Ministries</a>
            </div>
        </div>
    </article>

    <div class="pb-20 pt-8 text-center">
        <a href="{{ route('ministries.index') }}" class="footer-link !text-pga-green">&larr; Back to all ministries</a>
    </div>
</div>
@endsection
