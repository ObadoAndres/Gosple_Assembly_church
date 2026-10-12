@extends('layouts.public')

@section('title', 'Sermons | Philadelphia Gospel Assembly')
@section('meta_description', 'Listen to and read biblical teaching from Philadelphia Gospel Assembly Tanzania.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Sermons</h1>
        <p class="text-lg text-[#706f6c]">Biblical teaching to encourage and equip your faith.</p>
    </div>

    @if($sermons->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($sermons as $sermon)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-[#06182D] mb-2">
                            <a href="{{ route('sermons.show', $sermon->slug) }}" class="hover:text-[#8a6d1f]">{{ $sermon->title }}</a>
                        </h2>
                        @if($sermon->scripture_reference)
                            <p class="text-sm text-[#706f6c] mb-2">{{ $sermon->scripture_reference }}</p>
                        @endif
                        @if($sermon->preacher)
                            <p class="text-sm text-[#706f6c] mb-2">by {{ $sermon->preacher }}</p>
                        @endif
                        @if($sermon->sermon_date)
                            <p class="text-sm text-[#706f6c] mb-3">{{ $sermon->sermon_date->format('M d, Y') }}</p>
                        @endif
                        @if($sermon->description)
                            <p class="text-sm text-[#1b1b18] line-clamp-3 mb-4">{{ $sermon->description }}</p>
                        @endif
                        <a href="{{ route('sermons.show', $sermon->slug) }}" class="text-[#8a6d1f] hover:text-[#06182D] font-medium rounded focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2">Read More &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">{{ $sermons->links() }}</div>
    @else
        <div class="text-center py-12">
            <p class="text-lg text-[#706f6c]">No sermons available yet. Please check back soon.</p>
        </div>
    @endif
</div>
@endsection
