@extends('layouts.public')

@section('title', 'Leadership | Philadelphia Gospel Assembly')
@section('meta_description', 'Meet the leadership of Philadelphia Gospel Assembly Tanzania - founder Arch Bishop Prof. Yohana Simon Masinga and the church leadership team.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Leadership</h1>
        <p class="text-lg text-[#706f6c]">Serving the Body of Christ with humility and faithfulness</p>
    </div>

    <section class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start mb-16">
        <div class="lg:col-span-2">
            <img src="{{ asset('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png') }}"
                 alt="Arch Bishop Prof. Yohana Simon Masinga"
                 class="w-full rounded-lg shadow-sm border border-gray-100 object-cover"
                 width="455" height="576" loading="lazy">
        </div>
        <div class="lg:col-span-3">
            <h2 class="text-2xl font-semibold text-[#06182D]">Arch Bishop Prof. Yohana Simon Masinga</h2>
            <p class="text-[#8a6d1f] font-medium mb-4">Founder &amp; Senior Leader</p>
            <div class="space-y-4 text-base text-[#1b1b18] leading-relaxed">
                <p>
                    Arch Bishop Prof. Yohana Simon Masinga is the founder and senior leader of
                    Philadelphia Gospel Assembly. His ministry began with a strong commitment to
                    evangelism, church planting, pastoral care, and the training of Christian leaders.
                </p>
                <p>
                    He served as a Pastor and Evangelist with Tanzania Assemblies of God from
                    <strong>1975 to 1989</strong>, and as an <strong>Overseer from 1982 to 1989</strong>.
                    Out of this ministry, Philadelphia Gospel Assembly was established and officially
                    registered on <strong>28 January 1992</strong>.
                </p>
                <p>
                    He continues to give himself to the work of the Gospel &mdash; strengthening churches,
                    developing Christian leaders, promoting Christian education, and serving communities
                    in Tanzania and beyond.
                </p>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-center mb-16">
        <div class="lg:col-span-2 order-2 lg:order-1">
            <h2 class="text-2xl font-semibold text-[#06182D] mb-2">Pastor Grace Masinga</h2>
            <p class="text-base text-[#706f6c] leading-relaxed">
                Pastor Grace Masinga serves alongside Arch Bishop Prof. Yohana Masinga in the ministry,
                sharing in the work of the church and its service to God&rsquo;s people.
            </p>
        </div>
        <div class="lg:col-span-3 order-1 lg:order-2">
            <img src="{{ asset('images/Prof.%20Bishop%20Yohana%20Masinga%20with%20his%20wife%20Pastor%20Grace%20Masinga.png') }}"
                 alt="Arch Bishop Prof. Yohana Masinga with his wife, Pastor Grace Masinga"
                 class="w-full rounded-lg shadow-sm border border-gray-100 object-cover"
                 width="992" height="811" loading="lazy">
        </div>
    </section>

    <section class="bg-[#06182D] rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <img src="{{ asset('images/Leadership%20philosophy.png') }}"
                     alt="Church leadership"
                     class="w-full h-full object-cover"
                     width="793" height="564" loading="lazy">
            </div>
            <div class="lg:col-span-3 p-6 sm:p-8 text-white">
                <h2 class="text-2xl font-semibold mb-4">Our Leadership Philosophy</h2>
                <p class="text-xl italic text-[#D8B04B] mb-4">
                    &ldquo;Kanisa ni Mali ya Yesu Kristo si Mali ya mtu yeyote.&rdquo;
                </p>
                <p class="text-base text-gray-200 leading-relaxed mb-4">
                    <strong class="text-white">Meaning:</strong> &ldquo;The Church is the property of
                    Jesus Christ, not the property of any person.&rdquo;
                </p>
                <p class="text-base text-gray-200 leading-relaxed">
                    This conviction shapes how we lead. Church leaders are stewards, not owners &mdash;
                    entrusted with a ministry that belongs to Christ alone. It calls every leader to
                    serve with humility, to give an account to God, and to remain committed to the
                    mission of Jesus Christ rather than to personal recognition or control. Leadership
                    in the church is therefore a calling to faithful service, responsibility, and
                    devotion to the One who purchased the Church with His own blood.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
