@extends('layouts.admin')

@section('title', 'Event Details')
@section('page-title', 'Event Details')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Event Details</h1>
        <p class="mt-1 text-sm text-pga-muted">Full record for this event.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-accent btn-sm">Edit</a>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm">Back to List</a>
    </div>
</div>

@if (session('success'))
    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-pga-green/25 bg-pga-green/8 px-4 py-3 text-sm text-pga-green-deep">
        <svg class="mt-0.5 h-5 w-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="admin-card mt-6 overflow-hidden">
    <div class="flex flex-wrap items-start justify-between gap-4 border-b border-pga-ink/8 px-6 py-5">
        <div>
            <h2 class="font-display text-xl font-semibold text-pga-ink">{{ $event->title }}</h2>
            <p class="mt-1 text-sm text-pga-muted">Slug: <span class="font-medium text-pga-ink">{{ $event->slug }}</span></p>
        </div>
        <span class="badge {{ $event->is_published ? 'badge-green' : 'badge-gray' }}">
            {{ $event->is_published ? 'Published' : 'Unpublished' }}
        </span>
    </div>

    <dl class="grid grid-cols-1 gap-px bg-pga-ink/8 md:grid-cols-2">
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Starts At</dt>
            <dd class="text-sm text-pga-ink">{{ $event->starts_at ? $event->starts_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Ends At</dt>
            <dd class="text-sm text-pga-ink">{{ $event->ends_at ? $event->ends_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Location</dt>
            <dd class="text-sm text-pga-ink">{{ $event->location ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Description</dt>
            <dd class="whitespace-pre-wrap text-sm text-pga-ink">{{ $event->description ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Published At</dt>
            <dd class="text-sm text-pga-ink">{{ $event->published_at ? $event->published_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Created At</dt>
            <dd class="text-sm text-pga-ink">{{ $event->created_at->format('Y-m-d H:i') }}</dd>
        </div>
    </dl>
</div>
@endsection
