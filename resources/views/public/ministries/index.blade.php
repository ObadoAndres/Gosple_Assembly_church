@extends('layouts.public')

@section('title', 'Ministries | Philadelphia Gospel Assembly')
@section('meta_description', 'The ministries and community development work of Philadelphia Gospel Assembly Tanzania.')

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
                            <a href="{{ route('ministries.show', $ministry->slug) }}" class="hover:text-[#8a6d1f]">{{ $ministry->name }}</a>
                        </h2>
                        @if($ministry->description)
                            <p class="text-sm text-[#1b1b18] line-clamp-3 mb-4">{{ $ministry->description }}</p>
                        @endif
                        <a href="{{ route('ministries.show', $ministry->slug) }}" class="text-[#8a6d1f] hover:text-[#06182D] font-medium rounded focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2">Learn More &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-lg text-[#706f6c]">No ministries available at this time.</p>
        </div>
    @endif

    <section class="mt-16 pt-16 border-t border-gray-100">
        <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#06182D] mb-3">Skills Training &amp; Community Development</h2>
            <p class="text-base text-[#706f6c] max-w-2xl mx-auto">As part of its community service, the church supports practical skills training that helps young people and families build sustainable livelihoods.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <figure class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <img src="{{ asset('images/capentry%20and%20wooding.png') }}"
                     alt="Carpentry and woodwork skills training"
                     class="w-full object-cover"
                     style="aspect-ratio: 416 / 242;"
                     width="416" height="242" loading="lazy">
                <figcaption class="p-6">
                    <h3 class="text-lg font-semibold text-[#06182D] mb-2">Carpentry &amp; Woodwork</h3>
                    <p class="text-sm text-[#1b1b18] leading-relaxed">Practical carpentry and woodwork training that equips participants with trade skills for employment and self-employment.</p>
                </figcaption>
            </figure>
            <figure class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <img src="{{ asset('images/Tailor%20and%20sewing.png') }}"
                     alt="Tailoring and sewing skills training"
                     class="w-full object-cover"
                     style="aspect-ratio: 415 / 242;"
                     width="415" height="242" loading="lazy">
                <figcaption class="p-6">
                    <h3 class="text-lg font-semibold text-[#06182D] mb-2">Tailoring &amp; Sewing</h3>
                    <p class="text-sm text-[#1b1b18] leading-relaxed">Tailoring and sewing training that helps participants develop practical skills for income generation and self-employment.</p>
                </figcaption>
            </figure>
        </div>
    </section>
</div>
@endsection
