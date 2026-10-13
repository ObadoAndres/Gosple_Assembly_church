@extends('layouts.public')

@section('title', 'About | Philadelphia Gospel Assembly')
@section('meta_description', 'Learn about Philadelphia Gospel Assembly Tanzania - a Pentecostal church founded through the ministry of Arch Bishop Prof. Yohana Simon Masinga and officially registered on 28 January 1992.')

@php
    $whatWeDo = [
        ['title' => 'Church Planting', 'description' => 'Establishing and strengthening congregations that faithfully teach the Word of God.', 'image' => 'Church Planting.jpg'],
        ['title' => 'Christian Education', 'description' => 'Helping believers grow into spiritually mature followers of Jesus Christ.', 'image' => 'Christian Education.jpg'],
        ['title' => 'Leadership Training', 'description' => 'Equipping pastors, evangelists, and ministers for faithful service to the Body of Christ.', 'image' => 'Leadership Training.jpg'],
        ['title' => 'Community Service', 'description' => 'Serving people in need and empowering young people through practical skills and self-employment initiatives.', 'image' => 'Community Service.jpg'],
    ];
    $objectives = [
        ['label' => 'A', 'title' => 'Spiritual Development', 'description' => 'To strengthen believers in faith, prayer, biblical knowledge, holiness, and Christian character.', 'image' => 'spiritual development.jpg'],
        ['label' => 'B', 'title' => 'Church Development', 'description' => 'To establish, develop, and strengthen churches in Tanzania and other nations.', 'image' => 'Church Development.jpg'],
        ['label' => 'C', 'title' => 'Leadership Development', 'description' => 'To train pastors, ministers, evangelists, teachers, and other Christian leaders for effective ministry and service.', 'image' => 'Leadership Training.jpg'],
        ['label' => 'D', 'title' => 'Intellectual Development', 'description' => 'To promote intellectual, academic, and professional development among members of the church and the wider community through education, training, research, and the development of knowledge and skills.', 'image' => 'intellectual development.jpg'],
        ['label' => 'E', 'title' => 'Educational Development and Schools', 'description' => 'To establish and support schools and educational institutions that provide quality academic, moral, and Christian education to children, young people, and adults.', 'image' => 'Educational Development and Schools.jpg'],
        ['label' => 'F', 'title' => 'Theological and Biblical Education', 'description' => 'To establish and develop Bible colleges and theological institutions for the training and preparation of pastors, ministers, missionaries, teachers, and Christian leaders.', 'image' => 'Theological and Biblical Education.jpg'],
        ['label' => 'G', 'title' => 'Health and Medical Services', 'description' => 'To establish and support hospitals, health centres, clinics, and other healthcare initiatives that provide quality medical services and contribute to the physical wellbeing of communities.', 'image' => 'Health and Medical Services.jpg'],
        ['label' => 'H', 'title' => 'Physical and Community Development', 'description' => 'To promote practical development initiatives that improve the living conditions and wellbeing of individuals, families, and communities.', 'image' => 'Physical and Community Development.jpg'],
        ['label' => 'I', 'title' => 'Youth Empowerment', 'description' => 'To empower young people through vocational training, entrepreneurship, and self-employment projects, including carpentry, woodworking, tailoring, and sewing.', 'image' => 'youth ministry.jpg'],
        ['label' => 'J', 'title' => 'Social Responsibility', 'description' => 'To assist widows, orphans, disadvantaged people, and other vulnerable members of society through appropriate social and humanitarian programmes.', 'image' => 'Social Responsibility.jpg'],
        ['label' => 'K', 'title' => 'Evangelism and Missions', 'description' => 'To proclaim the Gospel of Jesus Christ, make disciples, establish churches, and extend Christian ministry throughout Tanzania, Africa, Asia, America, and other parts of the world.', 'image' => 'Evangelism & Outreach.jpg'],
        ['label' => 'L', 'title' => 'Community Transformation', 'description' => 'To contribute to the spiritual, intellectual, educational, physical, economic, and social transformation of communities through integrated Christian ministry and development programmes.', 'image' => 'Community Transformation.jpg'],
    ];
@endphp

@section('content')
<x-public.page-header
    eyebrow="About Us"
    title="Philadelphia Gospel Assembly"
    subtitle="A Pentecostal Christian church family in Dodoma, Tanzania — proclaiming Christ and serving our communities since 1992."
    image="pjiladelphia full gospel assembly.jpg" />

<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    {{-- Intro --}}
    <section class="reveal clay -mt-10 relative z-10 p-7 sm:p-10">
        <p class="prose-pga text-center text-lg">
            Philadelphia Gospel Assembly is a Pentecostal Christian church organization committed to
            proclaiming the Gospel of Jesus Christ, building a strong and united Body of Christ, and
            serving communities in Tanzania and beyond. The name <em class="text-pga-green not-italic font-semibold">Philadelphia</em> means
            &ldquo;brotherly love&rdquo; &mdash; a call for God&rsquo;s people to live in unity and to
            demonstrate the love of Christ to the world around them.
        </p>

        <nav aria-label="About Philadelphia Gospel Assembly" class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4">
            <a href="#our-history" class="btn btn-outline !px-3 text-sm">Our Story</a>
            <a href="{{ route('vision-mission') }}" class="btn btn-outline !px-3 text-sm">Vision &amp; Faith</a>
            <a href="{{ route('leadership') }}" class="btn btn-outline !px-3 text-sm">Leadership</a>
            <a href="{{ route('ministries.index') }}" class="btn btn-outline !px-3 text-sm">Ministries</a>
        </nav>
    </section>

    {{-- Our story --}}
    <section id="our-history" class="grid items-start gap-10 py-16 lg:grid-cols-5 lg:py-20">
        <div class="reveal lg:col-span-2">
            <div class="zoom-media overflow-hidden rounded-3xl border border-white/70 shadow-soft">
                <img src="{{ asset('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png') }}"
                     alt="Arch Bishop Prof. Yohana Simon Masinga"
                     class="w-full object-cover" width="455" height="576" loading="lazy">
            </div>
            <p class="mt-3 text-center text-sm text-pga-muted">Founder and Senior Leader, Arch Bishop Prof. Yohana Simon Masinga</p>
            <div class="zoom-media mt-6 overflow-hidden rounded-3xl border border-white/70 shadow-soft">
                <img src="{{ asset('images/Prof.%20Bishop%20Yohana%20Masinga%20with%20the%20Former.png') }}"
                     alt="Arch Bishop Prof. Yohana Simon Masinga during his ministry"
                     class="w-full object-cover" width="566" height="565" loading="lazy">
            </div>
            <p class="mt-3 text-center text-sm text-pga-muted">Arch Bishop Prof. Yohana Simon Masinga during his ministry</p>
        </div>
        <div class="reveal reveal-delay-1 lg:col-span-3">
            <p class="eyebrow">Our Story</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">A vision that became a movement</h2>
            <div class="prose-pga mt-5">
                <p>
                    Philadelphia Gospel Assembly grew out of the ministry and vision of its founder,
                    <strong>Arch Bishop Prof. Yohana Simon Masinga</strong>. His ministry began with a
                    deep commitment to evangelism, church planting, pastoral ministry, and the training
                    of Christian leaders. He served as a Pastor and Evangelist with Tanzania Assemblies
                    of God from <strong>1975 to 1989</strong>, and as an <strong>Overseer from 1982 to 1989</strong>.
                    During that season he cared for local congregations, guided emerging leaders, and
                    carried the Gospel to communities across the country.
                </p>
                <p>
                    From this foundation, the ministry developed into an evangelistic and
                    church-planting work that ultimately gave rise to Philadelphia Gospel Assembly. What
                    began as a local congregation in Dodoma grew into a movement of churches in different
                    regions of Tanzania and beyond, as the church continued to plant congregations,
                    disciple believers, and prepare workers for the harvest.
                </p>
                <p>
                    Philadelphia Gospel Assembly was officially registered in Tanzania on
                    <strong>28 January 1992</strong>. Since then, the church has continued to grow in
                    church planting, Christian education, leadership training, and community service.
                </p>
            </div>
            <div class="mt-8 grid grid-cols-3 gap-4">
                <div class="clay-panel p-4 text-center">
                    <p class="font-display text-2xl font-semibold text-pga-green">1975</p>
                    <p class="mt-1 text-[0.65rem] uppercase tracking-[0.16em] text-pga-muted">Ministry began</p>
                </div>
                <div class="clay-panel p-4 text-center">
                    <p class="font-display text-2xl font-semibold text-pga-red">1992</p>
                    <p class="mt-1 text-[0.65rem] uppercase tracking-[0.16em] text-pga-muted">Registered</p>
                </div>
                <div class="clay-panel p-4 text-center">
                    <p class="font-display text-2xl font-semibold text-pga-gold-deep">6+</p>
                    <p class="mt-1 text-[0.65rem] uppercase tracking-[0.16em] text-pga-muted">Nations</p>
                </div>
            </div>
        </div>
    </section>

    {{-- What we do --}}
    <section class="pb-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="eyebrow eyebrow--center">What We Do</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Ministry in action</h2>
        </div>
        <div class="mt-10 grid gap-6 sm:grid-cols-2">
            @foreach ($whatWeDo as $item)
                <div class="reveal card-premium lift zoom-media h-full overflow-hidden">
                    <div class="h-44 overflow-hidden">
                        <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}" class="h-full w-full object-cover" width="800" height="320" loading="lazy">
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-lg font-semibold text-pga-green-deep">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-pga-muted">{{ $item['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Objectives --}}
    <section class="py-16">
        <div class="reveal mx-auto max-w-3xl text-center">
            <p class="eyebrow eyebrow--center">A to L</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Our Core Objectives</h2>
            <p class="mt-3 text-sm text-pga-muted">The church&rsquo;s core objectives are set out from A to L below. These describe the church&rsquo;s stated mission and development goals; institutions such as schools, colleges, and health facilities are listed as objectives and should not be assumed to be operational.</p>
        </div>
        <div class="mt-10 grid gap-5 md:grid-cols-2">
            @foreach ($objectives as $objective)
                <div class="reveal card-premium lift zoom-media h-full overflow-hidden">
                    <div class="h-36 overflow-hidden">
                        <img src="{{ asset('images/' . $objective['image']) }}" alt="{{ $objective['title'] }}" class="h-full w-full object-cover" width="800" height="280" loading="lazy">
                    </div>
                    <div class="p-6">
                        <div class="flex items-start gap-3">
                            <span class="grid h-8 w-8 flex-shrink-0 place-items-center rounded-xl bg-gradient-to-br from-pga-green to-pga-green-deep font-display text-sm font-semibold text-white">{{ $objective['label'] }}</span>
                            <h3 class="font-display text-lg font-semibold text-pga-green-deep">{{ $objective['title'] }}</h3>
                        </div>
                        <p class="mt-3 text-sm leading-relaxed text-pga-ink/85">{{ $objective['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Bible college --}}
    <section class="pb-16">
        <div class="reveal clay-green overflow-hidden p-7 sm:p-10">
            <div class="grid items-center gap-8 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    <p class="eyebrow eyebrow--light">Christian Education</p>
                    <h2 class="mt-4 font-display text-2xl font-semibold sm:text-3xl">Philadelphia Bible College</h2>
                    <div class="mt-5 space-y-4 text-white/80">
                        <p>
                            As part of its commitment to Christian education and leadership development,
                            Philadelphia Gospel Assembly operates <strong class="text-white">Philadelphia Bible College</strong> in
                            <strong class="text-white">Dodoma, Area C, Wajenzi, Tanzania</strong>. The college trains pastors,
                            evangelists, and Christian workers, equipping them with sound biblical teaching and
                            practical ministry skills for service in the church and the community.
                        </p>
                        <p>
                            Through the college and its wider training programmes, the church continues to
                            prepare men and women who will faithfully carry the Gospel and strengthen the Body of
                            Christ in Tanzania and beyond.
                        </p>
                    </div>
                </div>
                <div class="grid gap-3">
                    <div class="glass-dark rounded-2xl p-5 text-center">
                        <p class="font-display text-3xl font-semibold text-pga-gold-soft">Dodoma</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.16em] text-white/60">Area C &middot; Wajenzi</p>
                    </div>
                    <div class="glass-dark rounded-2xl p-5 text-center">
                        <p class="font-display text-3xl font-semibold text-pga-gold-soft">Bible</p>
                        <p class="mt-1 text-xs uppercase tracking-[0.16em] text-white/60">College &amp; Training</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Skills training --}}
    <section class="pb-16">
        <div class="reveal">
            <p class="eyebrow">Community Service</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Skills Training &amp; Livelihoods</h2>
            <p class="mt-3 max-w-3xl text-pga-muted">
                Alongside its spiritual ministry, the church supports community development &mdash; including
                practical skills training that helps young people and families build sustainable livelihoods.
            </p>
        </div>
        <div class="mt-8 grid gap-6 sm:grid-cols-2">
            <figure class="reveal card-premium lift zoom-media overflow-hidden">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('images/capentry%20and%20wooding.png') }}" alt="Carpentry and woodwork skills training"
                         class="h-full w-full object-cover" width="416" height="242" loading="lazy">
                </div>
                <figcaption class="p-6">
                    <h3 class="font-display text-lg font-semibold text-pga-green-deep">Carpentry &amp; Woodwork</h3>
                    <p class="mt-2 text-sm text-pga-muted">Practical trade skills for employment and self-employment.</p>
                </figcaption>
            </figure>
            <figure class="reveal reveal-delay-1 card-premium lift zoom-media overflow-hidden">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('images/Tailor%20and%20sewing.png') }}" alt="Tailoring and sewing skills training"
                         class="h-full w-full object-cover" width="415" height="242" loading="lazy">
                </div>
                <figcaption class="p-6">
                    <h3 class="font-display text-lg font-semibold text-pga-green-deep">Tailoring &amp; Sewing</h3>
                    <p class="mt-2 text-sm text-pga-muted">Developing practical skills for income generation.</p>
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- Global reach --}}
    <section class="pb-16">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="eyebrow eyebrow--center">Our Reach</p>
            <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep sm:text-3xl">Geographical Ministry &amp; Global Vision</h2>
        </div>
        <div class="mt-10 grid gap-6 lg:grid-cols-2">
            <div class="reveal clay p-7">
                <h3 class="font-display text-lg font-semibold text-pga-green-deep">Ministry Reach</h3>
                <div class="mt-4 space-y-4 text-sm leading-relaxed text-pga-ink/85">
                    <p>Philadelphia Gospel Assembly began with a local church in Tanzania and expanded from Dodoma to other regions of Tanzania.</p>
                    <p>The ministry also established churches in <strong>Burundi</strong>, the <strong>Democratic Republic of Congo (DRC)</strong>, <strong>Namibia</strong>, <strong>Botswana</strong>, and the <strong>Philippines</strong>.</p>
                    <p class="text-pga-muted italic">This describes the ministry&rsquo;s historical church-planting reach. A comprehensive, current list of congregations is not available; an official congregation list is to be supplied by the church before publication.</p>
                </div>
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach (['Tanzania', 'Burundi', 'DRC', 'Namibia', 'Botswana', 'Philippines'] as $nation)
                        <span class="pill pill-green">{{ $nation }}</span>
                    @endforeach
                </div>
            </div>
            <div class="reveal reveal-delay-1 clay p-7">
                <h3 class="font-display text-lg font-semibold text-pga-green-deep">Our Global Vision</h3>
                <p class="mt-4 text-sm leading-relaxed text-pga-ink/85">
                    The church describes its geographical ministry as extending across
                    <strong>Tanzania</strong>, <strong>Africa</strong>, and <strong>Asia</strong>, reaching a
                    global family of believers. Its international outlook is to proclaim the Gospel to all nations,
                    make disciples, establish churches, develop Christian leaders, and serve communities across
                    geographical and cultural boundaries.
                </p>
                <ul class="mt-5 space-y-3 text-sm text-pga-ink/85">
                    @foreach (['Proclaim the Gospel to all nations', 'Make disciples and establish churches', 'Develop Christian leaders', 'Serve communities across borders'] as $point)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 grid h-5 w-5 flex-shrink-0 place-items-center rounded-full bg-pga-gold/25 text-pga-gold-deep">
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Motto --}}
    <section class="pb-20">
        <div class="reveal clay-green relative overflow-hidden p-8 text-center sm:p-12">
            <p class="eyebrow eyebrow--light eyebrow--center">Our Motto</p>
            <p class="mt-5 font-display text-2xl italic text-white sm:text-3xl">&ldquo;Philadelphia tunasonga mbele, Bwana yu pamoja nasi.&rdquo;</p>
            <p class="mt-3 text-white/70">&ldquo;Philadelphia, we move forward &mdash; the Lord is with us.&rdquo;</p>
        </div>
    </section>
</div>
@endsection
