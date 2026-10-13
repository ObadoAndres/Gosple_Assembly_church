@extends('layouts.admin')

@section('title', 'Sermon Details')
@section('page-title', 'Sermon Details')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Sermon Details</h1>
        <p class="mt-1 text-sm text-pga-muted">Full record for this message.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.sermons.edit', $sermon) }}" class="btn btn-accent btn-sm">Edit</a>
        <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline btn-sm">Back to List</a>
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
            <h2 class="font-display text-xl font-semibold text-pga-ink">{{ $sermon->title }}</h2>
            <p class="mt-1 text-sm text-pga-muted">Slug: <span class="font-medium text-pga-ink">{{ $sermon->slug }}</span></p>
        </div>
        <span class="badge {{ $sermon->is_published ? 'badge-green' : 'badge-gray' }}">
            {{ $sermon->is_published ? 'Published' : 'Unpublished' }}
        </span>
    </div>

    <dl class="grid grid-cols-1 gap-px bg-pga-ink/8 md:grid-cols-2">
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Preacher</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->preacher ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Category</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->category ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Sermon Date</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->sermon_date ? $sermon->sermon_date->format('Y-m-d') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Scripture Reference</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->scripture_reference ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Video URL</dt>
            <dd class="break-all text-sm text-pga-ink">
                @if ($sermon->video_url)
                    <a href="{{ $sermon->video_url }}" target="_blank" rel="noopener" class="text-pga-green hover:underline">{{ $sermon->video_url }}</a>
                @else
                    -
                @endif
            </dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Audio URL</dt>
            <dd class="break-all text-sm text-pga-ink">
                @if ($sermon->audio_url)
                    <a href="{{ $sermon->audio_url }}" target="_blank" rel="noopener" class="text-pga-green hover:underline">{{ $sermon->audio_url }}</a>
                @else
                    -
                @endif
            </dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Description</dt>
            <dd class="whitespace-pre-wrap text-sm text-pga-ink">{{ $sermon->description ?? '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Published At</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->published_at ? $sermon->published_at->format('Y-m-d H:i') : '-' }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Created At</dt>
            <dd class="text-sm text-pga-ink">{{ $sermon->created_at->format('Y-m-d H:i') }}</dd>
        </div>
    </dl>
</div>
@endsection
