@extends('layouts.admin')

@section('title', 'Edit Event')
@section('page-title', 'Edit Event')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Edit Event</h1>
        <p class="mt-1 text-sm text-pga-muted">Update the details of this event.</p>
    </div>
    <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Back to List
    </a>
</div>

@if ($errors->any())
    <div class="mt-6 rounded-2xl border border-pga-red/25 bg-pga-red/8 px-4 py-3 text-sm text-pga-red-deep">
        <p class="font-semibold">Please fix the following:</p>
        <ul class="mt-1 list-inside list-disc space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-card mt-6 p-6 sm:p-8">
    <form method="POST" action="{{ route('admin.events.update', $event) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="admin-label">Title <span class="text-pga-red">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="field" required>
                @error('title')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="slug" class="admin-label">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $event->slug) }}" class="field">
                @error('slug')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="starts_at" class="admin-label">Starts At <span class="text-pga-red">*</span></label>
                <input type="datetime-local" name="starts_at" id="starts_at" value="{{ old('starts_at', $event->starts_at?->format('Y-m-d\TH:i')) }}" class="field" required>
                @error('starts_at')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="ends_at" class="admin-label">Ends At (optional)</label>
                <input type="datetime-local" name="ends_at" id="ends_at" value="{{ old('ends_at', $event->ends_at?->format('Y-m-d\TH:i')) }}" class="field">
                @error('ends_at')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="location" class="admin-label">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="field">
                @error('location')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="admin-label">Description</label>
                <textarea name="description" id="description" rows="4" class="field">{{ old('description', $event->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 rounded-xl border border-pga-ink/10 bg-white/60 px-4 py-3">
                    <input type="checkbox" name="is_published" value="1" class="admin-check" {{ old('is_published', $event->is_published) ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-pga-ink">Published</span>
                </label>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-pga-ink/8 pt-6">
            <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm">Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm">Update Event</button>
        </div>
    </form>
</div>
@endsection
