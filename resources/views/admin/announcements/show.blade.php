@extends('layouts.admin')

@section('title', 'Announcement Details')
@section('page-title', 'Announcement Details')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Announcement Details</h1>
        <p class="mt-1 text-sm text-pga-muted">Full record for this notice.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-accent btn-sm">Edit</a>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-sm">Back to List</a>
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
            <h2 class="font-display text-xl font-semibold text-pga-ink">{{ $announcement->title }}</h2>
            <p class="mt-1 text-sm text-pga-muted">Slug: <span class="font-medium text-pga-ink">{{ $announcement->slug }}</span></p>
        </div>
        @if (!$announcement->is_published)
            <span class="badge badge-gray">Draft</span>
        @elseif ($announcement->published_at && $announcement->published_at->gt(now()))
            <span class="badge badge-yellow">Scheduled</span>
        @elseif ($announcement->expires_at && $announcement->expires_at->lte(now()))
            <span class="badge badge-red">Expired</span>
        @else
            <span class="badge badge-green">Published</span>
        @endif
    </div>

    <dl class="grid grid-cols-1 gap-px bg-pga-ink/8 md:grid-cols-2">
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Published At</dt>
            <dd class="text-sm text-pga-ink">{{ $announcement->published_at ? $announcement->published_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Expires At</dt>
            <dd class="text-sm text-pga-ink">{{ $announcement->expires_at ? $announcement->expires_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Body</dt>
            <dd class="whitespace-pre-wrap text-sm text-pga-ink">{{ $announcement->body }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Created At</dt>
            <dd class="text-sm text-pga-ink">{{ $announcement->created_at->format('Y-m-d H:i') }}</dd>
        </div>
    </dl>
</div>
@endsection
