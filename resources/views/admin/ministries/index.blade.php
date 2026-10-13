@extends('layouts.admin')

@section('title', 'Ministries')
@section('page-title', 'Ministries')

@section('content')
<div class="flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="font-display text-2xl font-semibold text-pga-ink">Ministries</h1>
        <p class="mt-1 text-sm text-pga-muted">Organise the departments and fellowships of the church.</p>
    </div>
    <a href="{{ route('admin.ministries.create') }}" class="btn btn-primary btn-sm">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Create Ministry
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
    <form method="GET" action="{{ route('admin.ministries.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label for="search" class="admin-label">Search</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="field" placeholder="Name">
        </div>
        <div>
            <label for="status" class="admin-label">Status</label>
            <select name="status" id="status" class="field">
                <option value="">All</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('admin.ministries.index') }}" class="btn btn-outline btn-sm">Clear</a>
        </div>
    </form>
</div>

<div class="admin-card mt-6 overflow-hidden">
    @if ($ministries->count() > 0)
        <div class="overflow-x-auto">
            <table class="admin-table min-w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ministries as $ministry)
                        <tr>
                            <td class="font-semibold text-pga-ink">{{ $ministry->name }}</td>
                            <td class="text-pga-muted">{{ $ministry->sort_order }}</td>
                            <td>
                                <span class="badge {{ $ministry->is_active ? 'badge-green' : 'badge-gray' }}">
                                    {{ $ministry->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center justify-end gap-x-4 gap-y-2">
                                    <a href="{{ route('admin.ministries.show', $ministry) }}" class="admin-action">View</a>
                                    <a href="{{ route('admin.ministries.edit', $ministry) }}" class="admin-action admin-action--warn">Edit</a>
                                    @if ($ministry->is_active)
                                        <form method="POST" action="{{ route('admin.ministries.deactivate', $ministry) }}" onsubmit="return confirm('Deactivate this ministry?');">
                                            @csrf
                                            <button type="submit" class="admin-action admin-action--warn">Deactivate</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.ministries.activate', $ministry) }}" onsubmit="return confirm('Activate this ministry?');">
                                            @csrf
                                            <button type="submit" class="admin-action">Activate</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.ministries.destroy', $ministry) }}" onsubmit="return confirm('Are you sure you want to delete this ministry?');">
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
            {{ $ministries->links() }}
        </div>
    @else
        <div class="px-6 py-16 text-center">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-pga-green/10 text-pga-green">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72M18 18.72a3 3 0 0 0 .513-5.962M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6 18.72a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1 4.682-2.72M6 18.72a9.094 9.094 0 0 0 3.741-.479" />
                </svg>
            </span>
            <p class="mt-4 font-display text-lg font-semibold text-pga-ink">No ministries found</p>
            <p class="mt-1 text-sm text-pga-muted">Add the fellowships and departments of the church.</p>
            <a href="{{ route('admin.ministries.create') }}" class="btn btn-primary btn-sm mt-5">Create your first ministry</a>
        </div>
    @endif
</div>
@endsection
