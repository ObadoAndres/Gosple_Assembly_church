@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Ministries</h1>
        <p class="text-lg text-[#706f6c]">Serving God and others through love and faithfulness.</p>
    </div>

    @if($ministries->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($ministries as $ministry)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-[#06182D] mb-3">
                            <a href="{{ route('ministries.show', $ministry->slug) }}" class="hover:text-[#D8B04B]">{{ $ministry->name }}</a>
                        </h2>
                        @if($ministry->description)
                            <p class="text-sm text-[#1b1b18] line-clamp-3 mb-4">{{ $ministry->description }}</p>
                        @endif
                        <a href="{{ route('ministries.show', $ministry->slug) }}" class="text-[#D8B04B] hover:text-[#b8943f] font-medium">Learn More ?</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-lg text-[#706f6c]">No ministries available at this time.</p>
        </div>
    @endif
</div>
@endsection
