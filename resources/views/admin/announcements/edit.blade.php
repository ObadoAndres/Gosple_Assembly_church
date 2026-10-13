@extends('layouts.admin')

@section('title', 'Edit Announcement')
@section('page-title', 'Edit Announcement')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Edit Announcement</h1>
        <p class="mt-1 text-sm text-pga-muted">Update the details of this notice.</p>
    </div>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-sm">
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
    <form method="POST" action="{{ route('admin.announcements.update', $announcement) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="admin-label">Title <span class="text-pga-red">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}" class="field" required>
                @error('title')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="slug" class="admin-label">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $announcement->slug) }}" class="field">
                @error('slug')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="published_at" class="admin-label">Published At</label>
                <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $announcement->published_at?->format('Y-m-d\TH:i')) }}" class="field">
                @error('published_at')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="expires_at" class="admin-label">Expires At</label>
                <input type="datetime-local" name="expires_at" id="expires_at" value="{{ old('expires_at', $announcement->expires_at?->format('Y-m-d\TH:i')) }}" class="field">
                @error('expires_at')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="body" class="admin-label">Body <span class="text-pga-red">*</span></label>
                <textarea name="body" id="body" rows="5" class="field" required>{{ old('body', $announcement->body) }}</textarea>
                @error('body')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 rounded-xl border border-pga-ink/10 bg-white/60 px-4 py-3">
                    <input type="checkbox" name="is_published" value="1" class="admin-check" {{ old('is_published', $announcement->is_published) ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-pga-ink">Published</span>
                </label>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-pga-ink/8 pt-6">
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-sm">Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm">Update Announcement</button>
        </div>
    </form>
</div>
@endsection
