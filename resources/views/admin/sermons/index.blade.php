@extends('layouts.admin')

@section('title', 'Sermons')
@section('page-title', 'Sermons')

@section('content')
<div class="flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Sermons</h1>
        <p class="mt-1 text-sm text-pga-muted">Publish and manage messages from the pulpit.</p>
    </div>
    <a href="{{ route('admin.sermons.create') }}" class="btn btn-primary btn-sm">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Create Sermon
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
    <form method="GET" action="{{ route('admin.sermons.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label for="search" class="admin-label">Search</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                   class="field" placeholder="Title or preacher">
        </div>
        <div>
            <label for="status" class="admin-label">Status</label>
            <select name="status" id="status" class="field">
                <option value="">All</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
            </select>
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('admin.sermons.index') }}" class="btn btn-outline btn-sm">Clear</a>
        </div>
    </form>
</div>

<div class="admin-card mt-6 overflow-hidden">
    @if ($sermons->count() > 0)
        <div class="overflow-x-auto">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Preacher</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sermons as $sermon)
                        <tr>
                            <td class="font-semibold text-pga-ink">{{ $sermon->title }}</td>
                            <td class="text-pga-muted">{{ $sermon->preacher ?? '-' }}</td>
                            <td class="text-pga-muted">{{ $sermon->sermon_date ? $sermon->sermon_date->format('Y-m-d') : '-' }}</td>
                            <td>
                                <span class="badge {{ $sermon->is_published ? 'badge-green' : 'badge-gray' }}">
                                    {{ $sermon->is_published ? 'Published' : 'Unpublished' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center justify-end gap-x-4 gap-y-2">
                                    <a href="{{ route('admin.sermons.show', $sermon) }}" class="admin-action">View</a>
                                    <a href="{{ route('admin.sermons.edit', $sermon) }}" class="admin-action admin-action--warn">Edit</a>
                                    @if ($sermon->is_published)
                                        <form method="POST" action="{{ route('admin.sermons.unpublish', $sermon) }}" onsubmit="return confirm('Unpublish this sermon?');">
                                            @csrf
                                            <button type="submit" class="admin-action admin-action--warn">Unpublish</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.sermons.publish', $sermon) }}" onsubmit="return confirm('Publish this sermon?');">
                                            @csrf
                                            <button type="submit" class="admin-action">Publish</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.sermons.destroy', $sermon) }}" onsubmit="return confirm('Are you sure you want to delete this sermon? This action cannot be undone.');">
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
            {{ $sermons->links() }}
        </div>
    @else
        <div class="px-6 py-16 text-center">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-pga-green/10 text-pga-green">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a6.75 6.75 0 0 0-6.75 6.75v3.75h3.75V13.5H6.75m10.5 3.75H13.5V13.5h3.75m0 3.75v3a3 3 0 0 1-3 3h-3" />
                </svg>
            </span>
            <p class="mt-4 font-display text-lg font-semibold text-pga-ink">No sermons found</p>
            <p class="mt-1 text-sm text-pga-muted">Start building your sermon library.</p>
            <a href="{{ route('admin.sermons.create') }}" class="btn btn-primary btn-sm mt-5">Create your first sermon</a>
        </div>
    @endif
</div>
@endsection
