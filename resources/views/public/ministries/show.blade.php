@extends('layouts.public')

@section('title', $ministry->name . ' | Ministries | Philadelphia Gospel Assembly')
@section('meta_description', Str::limit(strip_tags($ministry->description ?? 'A ministry of Philadelphia Gospel Assembly Tanzania.'), 150))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-6">
        <a href="{{ route('ministries.index') }}" class="text-[#06182D] hover:text-[#8a6d1f] font-medium rounded focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2">&larr; Back to Ministries</a>
    </div>

    <article class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-6">{{ $ministry->name }}</h1>

        @if($ministry->description)
            <div class="prose max-w-none">
                <p class="text-base text-[#1b1b18] leading-relaxed whitespace-pre-wrap">{{ $ministry->description }}</p>
            </div>
        @endif
    </article>
</div>
@endsection
