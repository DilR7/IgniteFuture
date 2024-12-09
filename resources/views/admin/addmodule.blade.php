@extends('admin.layouts.admin')

@section('title', 'Add Module')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Add Module</h2>
        <form action="{{ route('storeModule') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Module Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter module name" required>
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea id="desc" name="desc" rows="4" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter module description" required></textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Slug</label>
                <input type="text" id="slug" name="slug" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter slug" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                <select id="category_id" name="category_id" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Module Image</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" class="w-full  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>
            <div class="mb-4">
                <label for="video" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Module Video</label>
                <input type="file" id="video" name="video" accept=".mp4,.mov,.avi" class="w-full  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}"> {{-- Assuming auth user --}}
            <button type="submit" class="w-full bg-gray-900 text-white font-medium rounded-lg text-sm px-5 py-2.5 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">Add Module</button>

            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
