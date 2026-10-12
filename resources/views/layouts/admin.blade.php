<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PGA') }} - Admin</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <a href="{{ route('admin.dashboard') }}">{{ config('app.name') }} Admin</a>
            </div>
            @auth
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @endauth
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
