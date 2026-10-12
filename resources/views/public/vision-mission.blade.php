@extends('layouts.public')

@section('title', 'Vision, Mission & Statement of Faith | Philadelphia Gospel Assembly')
@section('meta_description', 'The vision, mission, and statement of faith of Philadelphia Gospel Assembly Tanzania.')

@section('content')
@php
    $missionPoints = [
        'Preach the Gospel of Jesus Christ.',
        'Establish and strengthen churches.',
        'Develop spiritually mature Christian believers.',
        'Train and equip Christian leaders and ministers.',
        'Build the Body of Christ spiritually, physically, and intellectually.',
        'Extend the Gospel to different nations and communities.',
        'Support widows, orphans, and disadvantaged people.',
        'Empower young people through practical skills and self-employment initiatives.',
    ];

    $faithPoints = [
        'Faith in Jesus Christ.',
        'The authority of the Holy Scriptures.',
        'Prayer and worship.',
        'The work of the Holy Spirit.',
        'Evangelism and missionary work.',
        'Christian discipleship.',
        'Development of the Body of Christ.',
        'Service to communities and people in need.',
    ];
@endphp

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Vision, Mission &amp; Statement of Faith</h1>
    </div>

    <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 mb-8">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Our Vision</h2>
        <p class="text-base text-[#1b1b18] leading-relaxed">
            To build a strong and united Body of Christ that transforms individuals, families,
            communities, and nations through the Gospel of Jesus Christ.
        </p>
    </section>

    <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 mb-8">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Our Mission</h2>
        <ol class="space-y-3 text-base text-[#1b1b18] leading-relaxed list-decimal list-inside">
            @foreach ($missionPoints as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ol>
    </section>

    <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Statement of Faith</h2>
        <ol class="space-y-3 text-base text-[#1b1b18] leading-relaxed list-decimal list-inside">
            @foreach ($faithPoints as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ol>
    </section>
</div>
@endsection
