<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $metaTitle = strip_tags($__env->yieldContent('title', config('app.name', 'Philadelphia Gospel Assembly')));
        $metaDescription = strip_tags($__env->yieldContent('meta_description', 'Philadelphia Gospel Assembly Tanzania - a Pentecostal Christian church proclaiming the Gospel of Jesus Christ in Dodoma and throughout the nations.'));
    @endphp
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Philadelphia Gospel Assembly">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:card" content="summary">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

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
<body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">
    @include('components.public.nav')

    <main>
        @yield('content')
    </main>

    @include('components.public.footer')

    <script>
        (function () {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (!menuBtn || !mobileMenu) {
                return;
            }

            const setOpen = (open) => {
                mobileMenu.classList.toggle('hidden', !open);
                menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                menuBtn.dataset.open = open ? 'true' : 'false';
            };

            menuBtn.addEventListener('click', () => {
                setOpen(menuBtn.dataset.open !== 'true');
            });

            mobileMenu.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => setOpen(false));
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && menuBtn.dataset.open === 'true') {
                    setOpen(false);
                    menuBtn.focus();
                }
            });
        })();
    </script>
</body>
</html>
