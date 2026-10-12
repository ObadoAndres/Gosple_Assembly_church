@extends('layouts.public')

@section('content')
    <section class="relative bg-[#06182D] text-white py-24 sm:py-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#06182D] via-[#0a1a3a] to-[#06182D] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 tracking-tight">Philadelphia Gospel Assembly</h1>
                <p class="text-xl sm:text-2xl mb-4 italic">"Philadelphia tunasonga mbele, Bwana yu pamoja nasi."</p>
                <p class="text-lg sm:text-xl mb-8">Knowing God. Growing in Faith. Living His Purpose.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-[#06182D] bg-[#D8B04B] hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-[#D8B04B] focus:ring-offset-2 focus:ring-offset-[#06182D] transition-colors">Join Us This Sunday</a>
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-white hover:text-[#06182D] focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#06182D] transition-colors">Come Worship With Us</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-16 sm:py-24 bg-[#FDFDFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Welcome</h2>
                <p class="text-lg text-[#706f6c] max-w-3xl mx-auto">Welcome to Philadelphia Gospel Assembly, a Christ-centered church family in Dodoma, Tanzania.</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 max-w-4xl mx-auto">
                <p class="text-base text-[#1b1b18] leading-relaxed mb-4">Our desire is to help people know God, grow in His Word, experience His presence, and live out their faith with purpose. Through worship, prayer, biblical teaching, fellowship, and service, we seek to build a community where every person can encounter Jesus Christ and discover their God-given purpose.</p>
                <p class="text-base text-[#1b1b18] leading-relaxed">Whether you are visiting for the first time or looking for a church family to call home, you are welcome here.</p>
            </div>
        </div>
    </section>

    <section id="services" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Service Times & Location</h2>
                <p class="text-lg text-[#706f6c]">Come as you are. We look forward to welcoming you and your family.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-[#FDFDFC] rounded-lg shadow-sm border border-gray-100 p-6">
                    <h3 class="text-xl font-semibold text-[#06182D] mb-4">Sunday Worship</h3>
                    <p class="text-[#706f6c] mb-2"><strong>Schedule:</strong> <span class="text-yellow-600 text-sm">(CONFIRMATION NEEDED)</span></p>
                    <p class="text-[#1b1b18] mb-2">Option 1: Sunday Worship Service | 9:00 AM - 12:00 PM</p>
                    <p class="text-[#1b1b18] mb-4">Option 2: Sunday Worship | Every Sunday 8:00 AM - 5:00 PM</p>
                    <p class="text-sm text-red-600 italic">* Conflicting service times in source documents. Please confirm official times.</p>
                </div>
                <div class="bg-[#FDFDFC] rounded-lg shadow-sm border border-gray-100 p-6">
                    <h3 class="text-xl font-semibold text-[#06182D] mb-4">Location</h3>
                    <p class="text-[#1b1b18] mb-2">Philadelphia Gospel Assembly</p>
                    <p class="text-[#706f6c] mb-2">Dodoma, Tanzania</p>
                    <p class="text-[#706f6c] mb-2">Location: RQV2+7QX, Dodoma</p>
                    <p class="text-[#706f6c] mb-4">Phone: TBD</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-2 border border-[#06182D] text-sm font-medium rounded-md text-[#06182D] hover:bg-[#06182D] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2 transition-colors">Get Directions</a>
                </div>
            </div>
        </div>
    </section>

    @if($upcomingEvents->count() > 0)
    <section id="events" class="py-16 sm:py-24 bg-[#FDFDFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Upcoming Events</h2>
                <p class="text-lg text-[#706f6c]">Join us for worship, prayer, fellowship, and spiritual growth.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingEvents as $event)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                        <h3 class="text-lg font-semibold text-[#06182D] mb-2">
                            <a href="{{ route('events.show', $event->slug) }}" class="hover:text-[#D8B04B]">{{ $event->title }}</a>
                        </h3>
                        <p class="text-[#706f6c] mb-2">{{ $event->starts_at->format('M d, Y g:i A') }}</p>
                        @if($event->description)
                            <p class="text-sm text-[#1b1b18] line-clamp-2">{{ Str::limit($event->description, 100) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('events.index') }}" class="inline-flex items-center justify-center px-6 py-2 border border-[#06182D] text-sm font-medium rounded-md text-[#06182D] hover:bg-[#06182D] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2 transition-colors">View All Events</a>
            </div>
        </div>
    </section>
    @endif

    @if($latestSermon)
    <section id="sermons" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Latest Sermon</h2>
                <p class="text-lg text-[#706f6c]">Grow in God's Word through the preaching of God's Word.</p>
            </div>
            <div class="bg-[#FDFDFC] rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 max-w-4xl mx-auto">
                <h3 class="text-xl font-semibold text-[#06182D] mb-2">{{ $latestSermon->title }}</h3>
                @if($latestSermon->scripture_reference)
                    <p class="text-[#706f6c] mb-4">{{ $latestSermon->scripture_reference }}</p>
                @endif
                @if($latestSermon->description)
                    <p class="text-base text-[#1b1b18] leading-relaxed mb-6 line-clamp-3">{{ $latestSermon->description }}</p>
                @endif
                <a href="{{ route('sermons.show', $latestSermon->slug) }}" class="inline-flex items-center justify-center px-6 py-2 border border-[#06182D] text-sm font-medium rounded-md text-[#06182D] hover:bg-[#06182D] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2 transition-colors">View Sermon</a>
            </div>
        </div>
    </section>
    @endif
@endsection
