@extends('layouts.public')

@section('title', $sermon->title . ' | Sermons | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($sermon->description ?? 'A sermon from Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-6">
        <a href="{{ route('sermons.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">&larr; Back to Sermons</a>
    </div>

    <article class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">{{ $sermon->title }}</h1>

        <div class="flex flex-wrap gap-4 text-sm text-[#706f6c] mb-6">
            @if($sermon->scripture_reference)
                <span>{{ $sermon->scripture_reference }}</span>
            @endif
            @if($sermon->preacher)
                <span>by {{ $sermon->preacher }}</span>
            @endif
            @if($sermon->category)
                <span>{{ $sermon->category }}</span>
            @endif
            @if($sermon->sermon_date)
                <span>{{ $sermon->sermon_date->format('M d, Y') }}</span>
            @endif
        </div>

        @if($sermon->description)
            <div class="prose max-w-none mb-6">
                <p class="text-base text-[#1b1b18] leading-relaxed whitespace-pre-wrap">{{ $sermon->description }}</p>
            </div>
        @endif

        <div class="space-y-4">
            @if($sermon->video_url)
                <div>
                    <h3 class="text-lg font-semibold text-[#06182D] mb-2">Video</h3>
                    <div class="aspect-w-16 aspect-h-9">
                        <a href="{{ $sermon->video_url }}" target="_blank" rel="noopener noreferrer" class="text-[#D8B04B] hover:text-[#b8943f] underline">{{ $sermon->video_url }}</a>
                    </div>
                </div>
            @endif

            @if($sermon->audio_url)
                <div>
                    <h3 class="text-lg font-semibold text-[#06182D] mb-2">Audio</h3>
                    <a href="{{ $sermon->audio_url }}" target="_blank" rel="noopener noreferrer" class="text-[#D8B04B] hover:text-[#b8943f] underline">{{ $sermon->audio_url }}</a>
                </div>
            @endif
        </div>
    </article>
</div>
@endsection
