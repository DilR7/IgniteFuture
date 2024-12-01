@extends('admin.layouts.admin')

@section('title', 'Edit Book')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <form action="{{ route('adminbook.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Book Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                value="{{ old('name', $book->name) }}" 
                required>
        </div>
    
        <div class="mb-4">
            <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea 
                name="desc" 
                id="desc" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                rows="3" 
                required>{{ old('desc', $book->desc) }}</textarea>
        </div>
    
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea 
                name="content" 
                id="content" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                rows="3" 
                required>{{ old('content', $book->content) }}</textarea>
        </div>
    
        <div class="mb-4">
            <label for="module_id" class="block text-sm font-medium text-gray-700">Select Module</label>
            <select 
                name="module_id" 
                id="module_id" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                required>
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}" 
                        {{ $module->id == $book->module_id ? 'selected' : '' }}>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <button 
            type="submit" 
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Save Changes
        </button>
    </form>
</div>

@endsection
