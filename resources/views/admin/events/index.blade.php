@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#06182D]">Events</h1>
        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 bg-[#D8B04B] text-[#06182D] rounded-md hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-[#D8B04B] transition-colors">Create Event</a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <form method="GET" action="{{ route('admin.events.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]" placeholder="Title">
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                    <option value="">All</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="unpublished" {{ request('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                </select>
            </div>
            <div>
                <label for="filter" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                <select name="filter" id="filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                    <option value="">All</option>
                    <option value="upcoming" {{ request('filter') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="past" {{ request('filter') == 'past' ? 'selected' : '' }}>Past</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="px-4 py-2 bg-[#06182D] text-white rounded-md hover:bg-[#1A1A1F] focus:outline-none focus:ring-2 focus:ring-[#06182D]">Filter</button>
                <a href="{{ route('admin.events.index') }}" class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none">Clear</a>
            </div>
        </form>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Event List</h2>
        </div>
        @if($events->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Starts At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ends At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($events as $event)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $event->starts_at ? $event->starts_at->format('Y-m-d H:i') : '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $event->ends_at ? $event->ends_at->format('Y-m-d H:i') : '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($event->is_published)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Unpublished</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.events.show', $event) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    @if($event->is_published)
                                        <form method="POST" action="{{ route('admin.events.unpublish', $event) }}" class="inline" onsubmit="return confirm('Unpublish this event?');">
                                            @csrf
                                            <button type="submit" class="text-orange-600 hover:text-orange-900">Unpublish</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.events.publish', $event) }}" class="inline" onsubmit="return confirm('Publish this event?');">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-900">Publish</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $events->links() }}
            </div>
        @else
            <div class="px-6 py-8 text-center text-gray-500">
                <p>No events found.</p>
                <a href="{{ route('admin.events.create') }}" class="mt-2 inline-block text-[#06182D] hover:text-[#D8B04B]">Create your first event</a>
            </div>
        @endif
    </div>
</div>
@endsection
