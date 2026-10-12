@extends('layouts.public')

@section('title', $event->title . ' | Events | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($event->description ?? 'An event at Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-6">
        <a href="{{ route('events.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">&larr; Back to Events</a>
    </div>

    <article class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">{{ $event->title }}</h1>

        <div class="mb-6 space-y-2 text-sm text-[#706f6c]">
            <p><strong>Date:</strong> {{ $event->starts_at->format('M d, Y') }}</p>
            <p><strong>Time:</strong> {{ $event->starts_at->format('g:i A') }}@if($event->ends_at) - {{ $event->ends_at->format('g:i A') }}@endif</p>
            @if($event->location)
                <p><strong>Location:</strong> {{ $event->location }}</p>
            @endif
        </div>

        @if($event->description)
            <div class="prose max-w-none">
                <p class="text-base text-[#1b1b18] leading-relaxed whitespace-pre-wrap">{{ $event->description }}</p>
            </div>
        @endif
    </article>
</div>
@endsection
