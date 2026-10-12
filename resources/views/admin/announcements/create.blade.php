@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#06182D]">Create Announcement</h1>
        <a href="{{ route('admin.announcements.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">? Back to List</a>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('admin.announcements.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]" required>
                </div>

                <div class="md:col-span-2">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug (optional)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]" placeholder="Leave blank to auto-generate">
                </div>

                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Published At</label>
                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div>
                    <label for="expires_at" class="block text-sm font-medium text-gray-700 mb-1">Expires At</label>
                    <input type="datetime-local" name="expires_at" id="expires_at" value="{{ old('expires_at') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div class="md:col-span-2">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Body <span class="text-red-500">*</span></label>
                    <textarea name="body" id="body" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]" required>{{ old('body') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1" class="rounded border-gray-300 text-[#06182D] focus:ring-[#06182D]" {{ old('is_published') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Published</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.announcements.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-[#D8B04B] text-[#06182D] rounded-md hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-[#D8B04B]">Create Announcement</button>
            </div>
        </form>
    </div>
</div>
@endsection
