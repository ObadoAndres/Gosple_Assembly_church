@extends('layouts.public')

@section('title', 'Leadership | Philadelphia Gospel Assembly')
@section('meta_description', 'Meet the leadership of Philadelphia Gospel Assembly Tanzania - founder Arch Bishop Prof. Yohana Simon Masinga and the church leadership team.')

@section('content')
<x-public.page-header
    eyebrow="Leadership"
    title="Serving with humility & faithfulness"
    subtitle="Meet the people God has entrusted with shepherding the Philadelphia Gospel Assembly family."
    image="Leadership philosophy.png" />

<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    {{-- Founder --}}
    <section class="-mt-10 grid items-start gap-10 lg:grid-cols-5">
        <div class="reveal lg:col-span-2">
            <div class="clay relative z-10 overflow-hidden p-3">
                <div class="zoom-media overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png') }}"
                         alt="Arch Bishop Prof. Yohana Simon Masinga"
                         class="w-full object-cover" width="455" height="576" loading="lazy">
                </div>
            </div>
        </div>
        <div class="reveal reveal-delay-1 lg:col-span-3 lg:pt-6">
            <span class="pill pill-red">Founder &amp; Senior Leader</span>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Arch Bishop Prof. Yohana Simon Masinga</h2>
            <div class="prose-pga mt-5">
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

    {{-- Pastor Grace --}}
    <section class="grid items-center gap-10 py-20 lg:grid-cols-5">
        <div class="reveal order-2 lg:order-1 lg:col-span-2">
            <span class="pill pill-green">Ministry Partner</span>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Pastor Grace Masinga</h2>
            <p class="mt-4 text-base leading-relaxed text-pga-muted">
                Pastor Grace Masinga serves alongside Arch Bishop Prof. Yohana Masinga in the ministry,
                sharing in the work of the church and its service to God&rsquo;s people.
            </p>
        </div>
        <div class="reveal reveal-delay-1 order-1 lg:order-2 lg:col-span-3">
            <div class="zoom-media overflow-hidden rounded-3xl border border-white/70 shadow-soft">
                <img src="{{ asset('images/Prof.%20Bishop%20Yohana%20Masinga%20with%20his%20wife%20Pastor%20Grace%20Masinga.png') }}"
                     alt="Arch Bishop Prof. Yohana Masinga with his wife, Pastor Grace Masinga"
                     class="w-full object-cover" width="992" height="811" loading="lazy">
            </div>
        </div>
    </section>

    {{-- Philosophy --}}
    <section class="reveal pb-20">
        <div class="clay-green relative grid overflow-hidden p-0 lg:grid-cols-5">
            <div class="relative lg:col-span-2">
                <img src="{{ asset('images/Leadership%20philosophy.png') }}"
                     alt="Church leadership" class="h-full w-full object-cover" width="793" height="564" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-pga-green-night/70 to-transparent lg:bg-gradient-to-r" aria-hidden="true"></div>
            </div>
            <div class="relative p-8 lg:col-span-3 lg:p-10">
                <p class="eyebrow eyebrow--light">Our Leadership Philosophy</p>
                <p class="mt-5 font-display text-xl italic text-pga-gold-soft sm:text-2xl">
                    &ldquo;Kanisa ni Mali ya Yesu Kristo si Mali ya mtu yeyote.&rdquo;
                </p>
                <p class="mt-3 text-sm text-white/75">
                    <strong class="text-white">Meaning:</strong> &ldquo;The Church is the property of
                    Jesus Christ, not the property of any person.&rdquo;
                </p>
                <p class="mt-5 text-sm leading-relaxed text-white/80">
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

    <div class="reveal pb-20 text-center">
        <div class="clay inline-flex flex-col items-center gap-4 p-8">
            <p class="font-display text-lg font-semibold text-pga-green-deep">Want to serve alongside us?</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Get Involved</a>
        </div>
    </div>
</div>
@endsection
