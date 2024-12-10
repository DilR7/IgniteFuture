@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
        <form method="POST" action="{{ route('adminbook.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Book Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="desc" id="desc" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3"
                    required></textarea>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content (PDF)</label>
                <input type="file" name="content" id="content"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Book Cover</label>
                <input type="file" name="img" id="img"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div class="mb-4">
                <label for="module_id" class="block text-sm font-medium text-gray-700">Select Module</label>
                <select name="module_id" id="module_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    required>
                    <option value="" disabled selected>Select a module</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Create Book
            </button>
        </form>
    </div>
@endsection
