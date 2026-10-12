@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#06182D]">Event Details</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.events.edit', $event) }}" class="px-4 py-2 bg-[#D8B04B] text-[#06182D] rounded-md hover:bg-yellow-400">Edit</a>
            <a href="{{ route('admin.events.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">? Back to List</a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $event->title }}</h2>
                <p class="text-sm text-gray-500">Slug: {{ $event->slug }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Starts At</label>
                <p class="mt-1 text-gray-900">{{ $event->starts_at ? $event->starts_at->format('Y-m-d H:i') : '-' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Ends At</label>
                <p class="mt-1 text-gray-900">{{ $event->ends_at ? $event->ends_at->format('Y-m-d H:i') : '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500">Location</label>
                <p class="mt-1 text-gray-900">{{ $event->location ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500">Description</label>
                <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $event->description ?? '-' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Status</label>
                <p class="mt-1">
                    @if($event->is_published)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                        @if($event->published_at)
                            <span class="ml-2 text-sm text-gray-500">({{ $event->published_at->format('Y-m-d H:i') }})</span>
                        @endif
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Unpublished</span>
                    @endif
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Created At</label>
                <p class="mt-1 text-gray-900">{{ $event->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
