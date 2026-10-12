@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#06182D]">Announcement Details</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="px-4 py-2 bg-[#D8B04B] text-[#06182D] rounded-md hover:bg-yellow-400">Edit</a>
            <a href="{{ route('admin.announcements.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">? Back to List</a>
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
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $announcement->title }}</h2>
                <p class="text-sm text-gray-500">Slug: {{ $announcement->slug }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Published At</label>
                <p class="mt-1 text-gray-900">{{ $announcement->published_at ? $announcement->published_at->format('Y-m-d H:i') : '-' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Expires At</label>
                <p class="mt-1 text-gray-900">{{ $announcement->expires_at ? $announcement->expires_at->format('Y-m-d H:i') : '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500">Body</label>
                <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $announcement->body }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Status</label>
                <p class="mt-1">
                    @if(!$announcement->is_published)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Draft</span>
                    @elseif($announcement->expires_at && $announcement->expires_at->lte(now()))
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                    @elseif($announcement->published_at && $announcement->published_at->gt(now()))
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Scheduled</span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                    @endif
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Created At</label>
                <p class="mt-1 text-gray-900">{{ $announcement->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
