@extends('layouts.admin')

@section('title', 'Ministry Details')
@section('page-title', 'Ministry Details')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Ministry Details</h1>
        <p class="mt-1 text-sm text-pga-muted">Full record for this ministry.</p>
    </div>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.ministries.edit', $ministry) }}" class="btn btn-accent btn-sm">Edit</a>
        <a href="{{ route('admin.ministries.index') }}" class="btn btn-outline btn-sm">Back to List</a>
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
            <h2 class="font-display text-xl font-semibold text-pga-ink">{{ $ministry->name }}</h2>
            <p class="mt-1 text-sm text-pga-muted">Slug: <span class="font-medium text-pga-ink">{{ $ministry->slug }}</span></p>
        </div>
        <span class="badge {{ $ministry->is_active ? 'badge-green' : 'badge-gray' }}">
            {{ $ministry->is_active ? 'Active' : 'Inactive' }}
        </span>
    </div>

    <dl class="grid grid-cols-1 gap-px bg-pga-ink/8 md:grid-cols-2">
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Sort Order</dt>
            <dd class="text-sm text-pga-ink">{{ $ministry->sort_order }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5">
            <dt class="admin-label">Created At</dt>
            <dd class="text-sm text-pga-ink">{{ $ministry->created_at->format('Y-m-d H:i') }}</dd>
        </div>
        <div class="bg-white/70 px-6 py-5 md:col-span-2">
            <dt class="admin-label">Description</dt>
            <dd class="whitespace-pre-wrap text-sm text-pga-ink">{{ $ministry->description }}</dd>
        </div>
    </dl>
</div>
@endsection
