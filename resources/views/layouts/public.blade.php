<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#006B38">
    @php
        $metaTitle = strip_tags($__env->yieldContent('title', config('app.name', 'Philadelphia Gospel Assembly')));
        $metaDescription = strip_tags($__env->yieldContent('meta_description', 'Philadelphia Gospel Assembly Tanzania - a Pentecostal Christian church proclaiming the Gospel of Jesus Christ in Dodoma and throughout the nations.'));
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Philadelphia Gospel Assembly">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:card" content="summary">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|fraunces:400,500,600,700,400i,600i" rel="stylesheet" />

    <noscript>
        <style>
            .reveal { opacity: 1 !important; transform: none !important; }
            #sidebar-overlay { display: none !important; }
            #site-sidebar {
                position: static !important;
                transform: none !important;
                visibility: visible !important;
                width: 100% !important;
                border-right: 0 !important;
            }
            #site-sidebar .sidebar-link { color: #fff; }
        </style>
    </noscript>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @php
            $cssPath = public_path('build/assets/app.css');
        @endphp
        @if (file_exists($cssPath))
            <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        @endif
        @if (file_exists(public_path('build/assets/app.js')))
            <script src="{{ asset('build/assets/app.js') }}" defer></script>
        @endif
    @endif
</head>
<body id="top" class="min-h-screen antialiased selection:bg-pga-gold-soft">
    <a href="#main-content"
       class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-pga-green focus:px-5 focus:py-2 focus:text-white">
        Skip to content
    </a>

    @include('components.public.nav')
    @include('components.public.sidebar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('components.public.footer')
</body>
</html>
