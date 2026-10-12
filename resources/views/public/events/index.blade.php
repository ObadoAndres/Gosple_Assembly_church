@extends('layouts.public')

@section('title', 'Events | Philadelphia Gospel Assembly')
@section('meta_description', 'Upcoming and past events at Philadelphia Gospel Assembly Tanzania.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Events</h1>
        <p class="text-lg text-[#706f6c]">Upcoming and past events at Philadelphia Gospel Assembly.</p>
    </div>

    @if($upcoming->count() > 0)
        <h2 class="text-2xl font-bold text-[#06182D] mb-6">Upcoming Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($upcoming as $event)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#06182D] mb-2">
                            <a href="{{ route('events.show', $event->slug) }}" class="hover:text-[#D8B04B]">{{ $event->title }}</a>
                        </h3>
                        <p class="text-sm text-[#706f6c] mb-2">{{ $event->starts_at->format('M d, Y g:i A') }}</p>
                        @if($event->location)
                            <p class="text-sm text-[#706f6c] mb-3">{{ $event->location }}</p>
                        @endif
                        @if($event->description)
                            <p class="text-sm text-[#1b1b18] line-clamp-3 mb-4">{{ Str::limit($event->description, 120) }}</p>
                        @endif
                        <a href="{{ route('events.show', $event->slug) }}" class="text-[#D8B04B] hover:text-[#b8943f] font-medium">Learn More &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <h2 class="text-2xl font-bold text-[#06182D] mb-6">Past Events</h2>
    @if($past->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($past as $event)
                <div class="bg-gray-50 rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#06182D] mb-2">
                            <a href="{{ route('events.show', $event->slug) }}" class="hover:text-[#D8B04B]">{{ $event->title }}</a>
                        </h3>
                        <p class="text-sm text-[#706f6c] mb-2">{{ $event->starts_at->format('M d, Y') }}</p>
                        @if($event->location)
                            <p class="text-sm text-[#706f6c] mb-3">{{ $event->location }}</p>
                        @endif
                        <a href="{{ route('events.show', $event->slug) }}" class="text-[#D8B04B] hover:text-[#b8943f] font-medium">View Details &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">{{ $past->links() }}</div>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-lg">
            <p class="text-lg text-[#706f6c]">No past events to display.</p>
        </div>
    @endif
</div>
@endsection
