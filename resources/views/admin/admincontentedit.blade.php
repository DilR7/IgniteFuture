@extends('admin.layouts.admin')

@section('title', 'Edit Content')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <form action="{{ route('admincontent.update', $content->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Content Name</label>
            <input type="text" name="name" id="name" value="{{ $content->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="desc" id="desc" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3" required>{{ $content->desc }}</textarea>
        </div>

        <div class="mb-4">
            <label for="video" class="block text-sm font-medium text-gray-700">Video URL</label>
            <input type="text" name="video" id="video" value="{{ $content->video }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="module_id" class="block text-sm font-medium text-gray-700">Select Module</label>
            <select name="module_id" id="module_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}" {{ $module->id == $content->module_id ? 'selected' : '' }}>{{ $module->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Content</button>
    </form>
</div>
@endsection
