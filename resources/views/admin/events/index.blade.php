@extends('layouts.admin')

@section('title', 'Events')
@section('page-title', 'Events')

@section('content')
<div class="flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Events</h1>
        <p class="mt-1 text-sm text-pga-muted">Schedule services, gatherings and special programmes.</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Create Event
    </a>
</div>

@if (session('success'))
    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-pga-green/25 bg-pga-green/8 px-4 py-3 text-sm text-pga-green-deep">
        <svg class="mt-0.5 h-5 w-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="admin-card mt-6 p-5">
    <form method="GET" action="{{ route('admin.events.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div>
            <label for="search" class="admin-label">Search</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="field" placeholder="Title">
        </div>
        <div>
            <label for="status" class="admin-label">Status</label>
            <select name="status" id="status" class="field">
                <option value="">All</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
            </select>
        </div>
        <div>
            <label for="filter" class="admin-label">Time</label>
            <select name="filter" id="filter" class="field">
                <option value="">All</option>
                <option value="upcoming" {{ request('filter') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="past" {{ request('filter') == 'past' ? 'selected' : '' }}>Past</option>
            </select>
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm">Clear</a>
        </div>
    </form>
</div>

<div class="admin-card mt-6 overflow-hidden">
    @if ($events->count() > 0)
        <div class="overflow-x-auto">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Starts At</th>
                        <th>Ends At</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="font-semibold text-pga-ink">{{ $event->title }}</td>
                            <td class="text-pga-muted">{{ $event->starts_at ? $event->starts_at->format('Y-m-d H:i') : '-' }}</td>
                            <td class="text-pga-muted">{{ $event->ends_at ? $event->ends_at->format('Y-m-d H:i') : '-' }}</td>
                            <td>
                                <span class="badge {{ $event->is_published ? 'badge-green' : 'badge-gray' }}">
                                    {{ $event->is_published ? 'Published' : 'Unpublished' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center justify-end gap-x-4 gap-y-2">
                                    <a href="{{ route('admin.events.show', $event) }}" class="admin-action">View</a>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="admin-action admin-action--warn">Edit</a>
                                    @if ($event->is_published)
                                        <form method="POST" action="{{ route('admin.events.unpublish', $event) }}" onsubmit="return confirm('Unpublish this event?');">
                                            @csrf
                                            <button type="submit" class="admin-action admin-action--warn">Unpublish</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.events.publish', $event) }}" onsubmit="return confirm('Publish this event?');">
                                            @csrf
                                            <button type="submit" class="admin-action">Publish</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-action admin-action--danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="border-t border-pga-ink/8 px-6 py-4">
            {{ $events->links() }}
        </div>
    @else
        <div class="px-6 py-16 text-center">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-pga-green/10 text-pga-green">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-12a1.5 1.5 0 0 1 1.5-1.5Z" />
                </svg>
            </span>
            <p class="mt-4 font-display text-lg font-semibold text-pga-ink">No events found</p>
            <p class="mt-1 text-sm text-pga-muted">Add upcoming services and gatherings.</p>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm mt-5">Create your first event</a>
        </div>
    @endif
</div>
@endsection
