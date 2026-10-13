@extends('layouts.admin')

@section('title', 'Edit Ministry')
@section('page-title', 'Edit Ministry')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Edit Ministry</h1>
        <p class="mt-1 text-sm text-pga-muted">Update the details of this ministry.</p>
    </div>
    <a href="{{ route('admin.ministries.index') }}" class="btn btn-outline btn-sm">
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
    <form method="POST" action="{{ route('admin.ministries.update', $ministry) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="name" class="admin-label">Name <span class="text-pga-red">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $ministry->name) }}" class="field" required>
                @error('name')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="slug" class="admin-label">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $ministry->slug) }}" class="field">
                @error('slug')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="sort_order" class="admin-label">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $ministry->sort_order) }}" min="0" class="field">
                @error('sort_order')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="admin-label">Description <span class="text-pga-red">*</span></label>
                <textarea name="description" id="description" rows="4" class="field" required>{{ old('description', $ministry->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-pga-red-deep">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 rounded-xl border border-pga-ink/10 bg-white/60 px-4 py-3">
                    <input type="checkbox" name="is_active" value="1" class="admin-check" {{ old('is_active', $ministry->is_active) ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-pga-ink">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-pga-ink/8 pt-6">
            <a href="{{ route('admin.ministries.index') }}" class="btn btn-outline btn-sm">Cancel</a>
            <button type="submit" class="btn btn-primary btn-sm">Update Ministry</button>
        </div>
    </form>
</div>
@endsection
