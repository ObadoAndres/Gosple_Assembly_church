@extends('layouts.public')

@section('title', 'About | Philadelphia Gospel Assembly')
@section('meta_description', 'Learn about Philadelphia Gospel Assembly Tanzania - a Pentecostal church founded through the ministry of Arch Bishop Prof. Yohana Simon Masinga and officially registered on 28 January 1992.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">About Us</h1>
        <p class="text-lg text-[#706f6c]">Philadelphia Gospel Assembly Tanzania, Dodoma</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 mb-10">
        <p class="text-base text-[#1b1b18] leading-relaxed">
            Philadelphia Gospel Assembly is a Pentecostal Christian church organization committed to
            proclaiming the Gospel of Jesus Christ, building a strong and united Body of Christ, and
            serving communities in Tanzania and beyond. The name <em>Philadelphia</em> means
            &ldquo;brotherly love&rdquo; &mdash; a call for God&rsquo;s people to live in unity and to
            demonstrate the love of Christ to the world around them.
        </p>
    </div>

    <section class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start mb-12">
        <div class="lg:col-span-2">
            <img src="{{ asset('images/Arch%20Bishop%20Prof%20Yohana%20Simon%20Masinga.png') }}"
                 alt="Arch Bishop Prof. Yohana Simon Masinga"
                 class="w-full rounded-lg shadow-sm border border-gray-100 object-cover"
                 loading="lazy">
            <p class="text-sm text-[#706f6c] mt-3 text-center">Founder and Senior Leader, Arch Bishop Prof. Yohana Simon Masinga</p>
            <img src="{{ asset('images/Prof.%20Bishop%20Yohana%20Masinga%20with%20the%20Former.png') }}"
                 alt="Arch Bishop Prof. Yohana Simon Masinga"
                 class="w-full rounded-lg shadow-sm border border-gray-100 object-cover mt-6"
                 loading="lazy">
            <p class="text-sm text-[#706f6c] mt-3 text-center">Arch Bishop Prof. Yohana Simon Masinga during his ministry</p>
        </div>
        <div class="lg:col-span-3">
            <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Our History</h2>
            <div class="space-y-4 text-base text-[#1b1b18] leading-relaxed">
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
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">What We Do</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-[#06182D] mb-1">Church Planting</h3>
                <p class="text-sm text-[#706f6c]">Establishing and strengthening congregations that faithfully teach the Word of God.</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-[#06182D] mb-1">Christian Education</h3>
                <p class="text-sm text-[#706f6c]">Helping believers grow into spiritually mature followers of Jesus Christ.</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-[#06182D] mb-1">Leadership Training</h3>
                <p class="text-sm text-[#706f6c]">Equipping pastors, evangelists, and ministers for faithful service to the Body of Christ.</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-[#06182D] mb-1">Community Service</h3>
                <p class="text-sm text-[#706f6c]">Serving people in need and empowering young people through practical skills and self-employment initiatives.</p>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Philadelphia Bible College</h2>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 space-y-4 text-base text-[#1b1b18] leading-relaxed">
            <p>
                As part of its commitment to Christian education and leadership development,
                Philadelphia Gospel Assembly operates <strong>Philadelphia Bible College</strong> in
                <strong>Dodoma, Area C, Wajenzi, Tanzania</strong>. The college trains pastors,
                evangelists, and Christian workers, equipping them with sound biblical teaching and
                practical ministry skills for service in the church and the community.
            </p>
            <p>
                Through the college and its wider training programmes, the church continues to
                prepare men and women who will faithfully carry the Gospel and strengthen the Body of
                Christ in Tanzania and beyond.
            </p>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Community Service and Skills Training</h2>
        <p class="text-base text-[#1b1b18] leading-relaxed mb-6">
            Alongside its spiritual ministry, the church supports community development &mdash; including
            practical skills training that helps young people and families build sustainable livelihoods.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <figure>
                <img src="{{ asset('images/capentry%20and%20wooding.png') }}"
                     alt="Carpentry and woodwork skills training"
                     class="w-full rounded-lg shadow-sm border border-gray-100 object-cover"
                     loading="lazy">
                <figcaption class="text-sm text-[#706f6c] mt-2">Carpentry and woodwork training</figcaption>
            </figure>
            <figure>
                <img src="{{ asset('images/Tailor%20and%20sewing.png') }}"
                     alt="Tailoring and sewing skills training"
                     class="w-full rounded-lg shadow-sm border border-gray-100 object-cover"
                     loading="lazy">
                <figcaption class="text-sm text-[#706f6c] mt-2">Tailoring and sewing training</figcaption>
            </figure>
        </div>
    </section>

    <section>
        <h2 class="text-2xl font-semibold text-[#06182D] mb-4">Our Motto</h2>
        <div class="bg-[#06182D] rounded-lg p-6 sm:p-8 text-white">
            <p class="text-xl italic mb-3">&ldquo;Philadelphia tunasonga mbele, Bwana yu pamoja nasi.&rdquo;</p>
            <p class="text-base text-gray-200">&ldquo;Philadelphia, we move forward &mdash; the Lord is with us.&rdquo;</p>
        </div>
    </section>
</div>
@endsection
