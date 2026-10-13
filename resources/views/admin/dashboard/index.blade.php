@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
@php
    $cards = [
        [
            'label' => 'Sermons',
            'value' => $stats['sermons'],
            'sub' => $stats['sermons_published'] . ' published',
            'route' => route('admin.sermons.index'),
            'tint' => 'from-pga-green to-pga-green-deep',
            'icon' => 'M12 6.75a6.75 6.75 0 0 0-6.75 6.75v3.75h3.75V13.5H6.75m10.5 3.75H13.5V13.5h3.75m0 3.75v3a3 3 0 0 1-3 3h-3',
        ],
        [
            'label' => 'Events',
            'value' => $stats['events'],
            'sub' => $stats['events_upcoming'] . ' upcoming',
            'route' => route('admin.events.index'),
            'tint' => 'from-pga-red to-pga-red-deep',
            'icon' => 'M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z',
        ],
        [
            'label' => 'Ministries',
            'value' => $stats['ministries'],
            'sub' => $stats['ministries_active'] . ' active',
            'route' => route('admin.ministries.index'),
            'tint' => 'from-pga-gold-soft to-pga-gold-deep',
            'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72M18 18.72a3 3 0 0 0 .513-5.962M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6 18.72a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1 4.682-2.72M6 18.72a9.094 9.094 0 0 0 3.741-.479',
        ],
        [
            'label' => 'Announcements',
            'value' => $stats['announcements'],
            'sub' => $stats['announcements_published'] . ' live',
            'route' => route('admin.announcements.index'),
            'tint' => 'from-pga-green-soft to-pga-green-deep',
            'icon' => 'M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46',
        ],
    ];
@endphp

<div class="mb-8">
    {{-- Welcome hero --}}
    <div class="clay-green relative overflow-hidden p-6 sm:p-8">
        <span class="blob -right-10 -top-16 h-52 w-52 bg-pga-gold/40"></span>
        <span class="blob -bottom-20 left-1/4 h-44 w-44 bg-pga-red/30"></span>
        <div class="relative z-10 flex flex-wrap items-end justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3 py-1 text-[0.65rem] font-bold uppercase tracking-[0.22em] text-pga-gold-soft">
                    <span class="h-1.5 w-1.5 rounded-full bg-pga-gold-soft"></span>
                    {{ now()->format('l, j F Y') }}
                </span>
                <h1 class="mt-4 font-display text-3xl font-semibold text-white sm:text-4xl">
                    Welcome back, {{ explode(' ', trim(auth()->user()->name ?? 'Administrator'))[0] }}.
                </h1>
                <p class="mt-2 max-w-xl text-sm text-white/75">
                    Manage sermons, events, ministries and announcements for Philadelphia Gospel Assembly — all from one place.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.sermons.create') }}" class="btn btn-gold btn-sm">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    New Sermon
                </a>
                <a href="{{ route('admin.events.create') }}" class="btn btn-ghost-light btn-sm">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    New Event
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Stat cards --}}
<div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
    @foreach ($cards as $card)
        <a href="{{ $card['route'] }}" class="admin-stat group block p-5">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-[0.68rem] font-bold uppercase tracking-[0.2em] text-pga-muted">{{ $card['label'] }}</p>
                    <p class="mt-3 font-display text-4xl font-semibold text-pga-ink">{{ $card['value'] }}</p>
                    <p class="mt-1 text-xs font-semibold text-pga-green">{{ $card['sub'] }}</p>
                </div>
                <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br {{ $card['tint'] }} text-white shadow-lg transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}" />
                    </svg>
                </span>
            </div>
        </a>
    @endforeach
</div>

<div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
    {{-- Recent sermons --}}
    <div class="admin-card overflow-hidden">
        <div class="flex items-center justify-between border-b border-pga-ink/8 px-5 py-4">
            <h2 class="font-display text-lg font-semibold text-pga-ink">Recent Sermons</h2>
            <a href="{{ route('admin.sermons.index') }}" class="admin-action">View all &rarr;</a>
        </div>
        @if ($recentSermons->count())
            <ul class="divide-y divide-pga-ink/8">
                @foreach ($recentSermons as $sermon)
                    <li class="flex items-center justify-between gap-4 px-5 py-3.5 transition-colors hover:bg-pga-green/4">
                        <div class="min-w-0">
                            <a href="{{ route('admin.sermons.show', $sermon) }}" class="block truncate text-sm font-semibold text-pga-ink hover:text-pga-green">
                                {{ $sermon->title }}
                            </a>
                            <p class="mt-0.5 text-xs text-pga-muted">
                                {{ $sermon->preacher ?: 'No preacher' }}
                                @if ($sermon->sermon_date) &middot; {{ $sermon->sermon_date->format('M j, Y') }} @endif
                            </p>
                        </div>
                        <span class="badge {{ $sermon->is_published ? 'badge-green' : 'badge-gray' }}">
                            {{ $sermon->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-5 py-10 text-center text-sm text-pga-muted">No sermons yet.</div>
        @endif
    </div>

    {{-- Upcoming events --}}
    <div class="admin-card overflow-hidden">
        <div class="flex items-center justify-between border-b border-pga-ink/8 px-5 py-4">
            <h2 class="font-display text-lg font-semibold text-pga-ink">Upcoming Events</h2>
            <a href="{{ route('admin.events.index') }}" class="admin-action">View all &rarr;</a>
        </div>
        @if ($upcomingEvents->count())
            <ul class="divide-y divide-pga-ink/8">
                @foreach ($upcomingEvents as $event)
                    <li class="flex items-center justify-between gap-4 px-5 py-3.5 transition-colors hover:bg-pga-green/4">
                        <div class="min-w-0">
                            <a href="{{ route('admin.events.show', $event) }}" class="block truncate text-sm font-semibold text-pga-ink hover:text-pga-green">
                                {{ $event->title }}
                            </a>
                            <p class="mt-0.5 text-xs text-pga-muted">
                                {{ $event->starts_at?->format('M j, Y \a\t g:i A') ?? 'Date TBA' }}
                                @if ($event->location) &middot; {{ $event->location }} @endif
                            </p>
                        </div>
                        <span class="badge {{ $event->is_published ? 'badge-green' : 'badge-gray' }}">
                            {{ $event->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-5 py-10 text-center text-sm text-pga-muted">No upcoming events.</div>
        @endif
    </div>
</div>

{{-- Active announcements --}}
<div class="mt-6 admin-card overflow-hidden">
    <div class="flex items-center justify-between border-b border-pga-ink/8 px-5 py-4">
        <h2 class="font-display text-lg font-semibold text-pga-ink">Live Announcements</h2>
        <a href="{{ route('admin.announcements.index') }}" class="admin-action">View all &rarr;</a>
    </div>
    @if ($activeAnnouncements->count())
        <ul class="divide-y divide-pga-ink/8">
            @foreach ($activeAnnouncements as $announcement)
                <li class="flex items-start justify-between gap-4 px-5 py-4 transition-colors hover:bg-pga-green/4">
                    <div class="min-w-0">
                        <a href="{{ route('admin.announcements.show', $announcement) }}" class="block truncate text-sm font-semibold text-pga-ink hover:text-pga-green">
                            {{ $announcement->title }}
                        </a>
                        <p class="mt-0.5 line-clamp-1 text-xs text-pga-muted">{{ \Illuminate\Support\Str::limit($announcement->body, 120) }}</p>
                    </div>
                    <span class="badge badge-gold">Live</span>
                </li>
            @endforeach
        </ul>
    @else
        <div class="px-5 py-10 text-center text-sm text-pga-muted">No active announcements.</div>
    @endif
</div>
@endsection
