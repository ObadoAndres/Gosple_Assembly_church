@extends('layouts.admin')

@section('title', 'Edit Sermon')
@section('page-title', 'Edit Sermon')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Edit Sermon</h1>
        <p class="mt-1 text-sm text-pga-muted">Update the details of this message.</p>
    </div>
    <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline btn-sm">
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
    <form method="POST" action="{{ route('admin.sermons.update', $sermon) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="admin-label">Title <span class="text-pga-red">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $sermon->title) }}" class="field" required>
                @error('title')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="slug" class="admin-label">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $sermon->slug) }}" class="field">
                @error('slug')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="preacher" class="admin-label">Preacher</label>
                <input type="text" name="preacher" id="preacher" value="{{ old('preacher', $sermon->preacher) }}" class="field">
                @error('preacher')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="category" class="admin-label">Category</label>
                <input type="text" name="category" id="category" value="{{ old('category', $sermon->category) }}" class="field">
                @error('category')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="sermon_date" class="admin-label">Sermon Date</label>
                <input type="date" name="sermon_date" id="sermon_date" value="{{ old('sermon_date', $sermon->sermon_date?->format('Y-m-d')) }}" class="field">
                @error('sermon_date')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="scripture_reference" class="admin-label">Scripture Reference</label>
                <input type="text" name="scripture_reference" id="scripture_reference" value="{{ old('scripture_reference', $sermon->scripture_reference) }}" class="field">
                @error('scripture_reference')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="video_url" class="admin-label">Video URL</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $sermon->video_url) }}" class="field">
                @error('video_url')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="audio_url" class="admin-label">Audio URL</label>
                <input type="url" name="audio_url" id="audio_url" value="{{ old('audio_url', $sermon->audio_url) }}" class="field">
                @error('audio_url')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="admin-label">Description</label>
                <textarea name="description" id="description" rows="4" class="field">{{ old('description', $sermon->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 rounded-xl border border-pga-ink/10 bg-white/60 px-4 py-3">
                    <input type="checkbox" name="is_published" value="1" class="admin-check" {{ old('is_published', $sermon->is_published) ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-pga-ink">Published</span>
                </label>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-pga-ink/8 pt-6">
            <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline btn-sm">Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm">Update Sermon</button>
        </div>
    </form>
</div>
@endsection
