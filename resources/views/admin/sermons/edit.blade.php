@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#06182D]">Edit Sermon</h1>
        <a href="{{ route('admin.sermons.index') }}" class="text-[#06182D] hover:text-[#D8B04B]">? Back to List</a>
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
        <form method="POST" action="{{ route('admin.sermons.update', $sermon) }}">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $sermon->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]" required>
                </div>

                <div class="md:col-span-2">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug (optional)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $sermon->slug) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div>
                    <label for="preacher" class="block text-sm font-medium text-gray-700 mb-1">Preacher</label>
                    <input type="text" name="preacher" id="preacher" value="{{ old('preacher', $sermon->preacher) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $sermon->category) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div>
                    <label for="sermon_date" class="block text-sm font-medium text-gray-700 mb-1">Sermon Date</label>
                    <input type="date" name="sermon_date" id="sermon_date" value="{{ old('sermon_date', $sermon->sermon_date?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div>
                    <label for="scripture_reference" class="block text-sm font-medium text-gray-700 mb-1">Scripture Reference</label>
                    <input type="text" name="scripture_reference" id="scripture_reference" value="{{ old('scripture_reference', $sermon->scripture_reference) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div class="md:col-span-2">
                    <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Video URL</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $sermon->video_url) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div class="md:col-span-2">
                    <label for="audio_url" class="block text-sm font-medium text-gray-700 mb-1">Audio URL</label>
                    <input type="url" name="audio_url" id="audio_url" value="{{ old('audio_url', $sermon->audio_url) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#06182D]">{{ old('description', $sermon->description) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1" class="rounded border-gray-300 text-[#06182D] focus:ring-[#06182D]" {{ old('is_published', $sermon->is_published) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Published</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.sermons.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-[#D8B04B] text-[#06182D] rounded-md hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-[#D8B04B]">Update Sermon</button>
            </div>
        </form>
    </div>
</div>
@endsection
