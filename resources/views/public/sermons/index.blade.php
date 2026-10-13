@extends('layouts.public')

@section('title', 'Sermons | Philadelphia Gospel Assembly')
@section('meta_description', 'Listen to and read biblical teaching from Philadelphia Gospel Assembly Tanzania.')

@section('content')
<x-public.page-header
    eyebrow="The Word"
    title="Sermons"
    subtitle="Biblical teaching to encourage and equip your faith."
    image="Theological and Biblical Education.jpg" />

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    {{-- YouTube --}}
    <section aria-labelledby="youtube-sermons-heading" class="py-16">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="eyebrow eyebrow--center">Watch &amp; Listen</p>
            <h2 id="youtube-sermons-heading" class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Watch on YouTube</h2>
            <p class="mt-3 text-pga-muted">Browse worship services, prayer gatherings, and special meetings from our church channel.</p>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($youtubeCollections as $collection)
                <a href="{{ $collection['url'] }}" target="_blank" rel="noopener noreferrer"
                   class="reveal card-premium lift zoom-media group flex h-full flex-col overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $collection['image'] }}" alt="{{ $collection['image_alt'] }}" class="h-full w-full object-cover" width="480" height="270" loading="lazy">
                        <span class="absolute inset-0 grid place-items-center bg-pga-green-night/40 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                            <span class="grid h-14 w-14 place-items-center rounded-full bg-white/90 text-pga-red shadow-lg transition-transform duration-500 group-hover:scale-110">
                                <svg class="h-6 w-6 translate-x-0.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.14v13.72L19 12 8 5.14Z" /></svg>
                            </span>
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="flex-1 font-display text-base font-semibold leading-snug text-pga-green-deep transition-colors group-hover:text-pga-red">{{ $collection['title'] }}</h3>
                        <span class="footer-link mt-4 !text-pga-red-deep">Watch on YouTube &rarr;</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Search --}}
    <form method="GET" action="{{ route('sermons.index') }}"
          class="reveal clay grid grid-cols-1 items-end gap-4 p-5 sm:grid-cols-[1fr_1fr_auto_auto] sm:p-6">
        <div>
            <label for="sermon-search" class="mb-1.5 block text-xs font-bold uppercase tracking-[0.14em] text-pga-muted">Search sermons</label>
            <input id="sermon-search" name="search" type="search" value="{{ $search }}" placeholder="Title, Scripture, preacher, or category" class="field">
        </div>
        <div>
            <label for="sermon-category" class="mb-1.5 block text-xs font-bold uppercase tracking-[0.14em] text-pga-muted">Category</label>
            <select id="sermon-category" name="category" class="field">
                <option value="">All categories</option>
                @foreach ($categories as $sermonCategory)
                    <option value="{{ $sermonCategory }}" {{ $category === $sermonCategory ? 'selected' : '' }}>{{ $sermonCategory }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        @if ($search !== '' || $category !== '')
            <a href="{{ route('sermons.index') }}" class="btn btn-outline">Clear</a>
        @endif
    </form>

    {{-- Results --}}
    @if ($sermons->count() > 0)
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($sermons as $sermon)
                <article class="reveal card-premium lift flex h-full flex-col p-7">
                    @if ($sermon->category)
                        <span class="pill pill-red self-start">{{ $sermon->category }}</span>
                    @endif
                    <h2 class="mt-4 font-display text-xl font-semibold leading-snug text-pga-green-deep">
                        <a href="{{ route('sermons.show', $sermon->slug) }}" class="transition-colors hover:text-pga-red">{{ $sermon->title }}</a>
                    </h2>
                    <div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-xs text-pga-muted">
                        @if ($sermon->scripture_reference)
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="h-3.5 w-3.5 text-pga-gold-deep" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z" /></svg>
                                {{ $sermon->scripture_reference }}
                            </span>
                        @endif
                        @if ($sermon->preacher)
                            <span>{{ $sermon->preacher }}</span>
                        @endif
                        @if ($sermon->sermon_date)
                            <span>{{ $sermon->sermon_date->format('M d, Y') }}</span>
                        @endif
                    </div>
                    @if ($sermon->description)
                        <p class="mt-4 flex-1 text-sm leading-relaxed text-pga-muted">{{ Str::limit($sermon->description, 150) }}</p>
                    @endif
                    <a href="{{ route('sermons.show', $sermon->slug) }}" class="footer-link mt-5 !text-pga-red-deep">Read More &rarr;</a>
                </article>
            @endforeach
        </div>
        <div class="mt-12">{{ $sermons->links() }}</div>
    @else
        <div class="reveal clay my-12 p-10 text-center">
            <p class="text-lg text-pga-muted">{{ $search !== '' || $category !== '' ? 'No sermons match your search. Try another title, Scripture, preacher, or category.' : 'No sermons have been published yet. Please check back soon.' }}</p>
        </div>
    @endif
</div>
@endsection
