@extends('layouts.admin')

@section('title', 'Announcements')
@section('page-title', 'Announcements')

@section('content')
<div class="flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Announcements</h1>
        <p class="mt-1 text-sm text-pga-muted">Share timely notices with the congregation.</p>
    </div>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Create Announcement
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
    <form method="GET" action="{{ route('admin.announcements.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label for="search" class="admin-label">Search</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="field" placeholder="Title or body">
        </div>
        <div>
            <label for="status" class="admin-label">Status</label>
            <select name="status" id="status" class="field">
                <option value="">All</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published (current)</option>
                <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-sm">Clear</a>
        </div>
    </form>
</div>

<div class="admin-card mt-6 overflow-hidden">
    @if ($announcements->count() > 0)
        <div class="overflow-x-auto">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Published At</th>
                        <th>Expires At</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td class="font-semibold text-pga-ink">{{ $announcement->title }}</td>
                            <td class="text-pga-muted">{{ $announcement->published_at ? $announcement->published_at->format('Y-m-d H:i') : '-' }}</td>
                            <td class="text-pga-muted">{{ $announcement->expires_at ? $announcement->expires_at->format('Y-m-d H:i') : '-' }}</td>
                            <td>
                                @if (!$announcement->is_published)
                                    <span class="badge badge-gray">Draft</span>
                                @elseif ($announcement->published_at && $announcement->published_at->gt(now()))
                                    <span class="badge badge-yellow">Scheduled</span>
                                @elseif ($announcement->expires_at && $announcement->expires_at->lte(now()))
                                    <span class="badge badge-red">Expired</span>
                                @else
                                    <span class="badge badge-green">Published</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center justify-end gap-x-4 gap-y-2">
                                    <a href="{{ route('admin.announcements.show', $announcement) }}" class="admin-action">View</a>
                                    <a href="{{ route('admin.announcements.edit', $announcement) }}" class="admin-action admin-action--warn">Edit</a>
                                    @if ($announcement->is_published)
                                        <form method="POST" action="{{ route('admin.announcements.unpublish', $announcement) }}" onsubmit="return confirm('Unpublish this announcement?');">
                                            @csrf
                                            <button type="submit" class="admin-action admin-action--warn">Unpublish</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.announcements.publish', $announcement) }}" onsubmit="return confirm('Publish this announcement?');">
                                            @csrf
                                            <button type="submit" class="admin-action">Publish</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.announcements.destroy', $announcement) }}" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
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
            {{ $announcements->links() }}
        </div>
    @else
        <div class="px-6 py-16 text-center">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-pga-green/10 text-pga-green">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59" />
                </svg>
            </span>
            <p class="mt-4 font-display text-lg font-semibold text-pga-ink">No announcements found</p>
            <p class="mt-1 text-sm text-pga-muted">Create a notice for the congregation.</p>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm mt-5">Create your first announcement</a>
        </div>
    @endif
</div>
@endsection
