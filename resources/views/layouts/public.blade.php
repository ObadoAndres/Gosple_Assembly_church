<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Philadelphia Gospel Assembly') }}</title>
    <meta name="description" content="Philadelphia Gospel Assembly Tanzania - Knowing God. Growing in Faith. Living His Purpose.">

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
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
                menuBtn.setAttribute('aria-expanded', !expanded);
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
