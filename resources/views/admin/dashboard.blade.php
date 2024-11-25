@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex space-x-4"> 
    <div class="flex-1"> 
        <div class="flex justify-end mb-4">
            <a href="{{ route('adminmodule') }}" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">View Module</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Module Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $m)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                        <td class="px-6 py-4">
                            {{ implode(' ', array_slice(explode(' ', $m->name), 0, 8)) }} ...
                        </td>
                        <td class="px-6 py-4">
                            {{ implode(' ', array_slice(explode(' ', $m->desc), 0, 8)) }} ...
                        </td>
                        <th class="px-3 py-2">
                            {{ $m->category->name }}
                        </th>                  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex-1">
        <div class="flex justify-end mb-4">
            <a href="{{ route('manageuser') }}" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">View User</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $s)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $s->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $s->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $s->email }}
                        </th>               
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- row 2 --}}

<div class="flex space-x-4"> 
    <div class="flex-1"> 
        <div class="flex justify-end mb-4">
            <a href="{{ route('adminquiz') }}" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">View Quiz</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Module</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz as $q)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $q->module->name }}
                        </th>
    
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $q->title }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex-1">
        <div class="flex justify-end mb-4">
            <a href="{{ route('adminbook') }}" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">View Book</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Book Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Cover</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminbook as $book)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $book->name }}
                        </th>
                           
                        <td class="px-6 py-4">
                            {{ implode(' ', array_slice(explode(' ', $book->desc), 0, 8)) }} ...
                        </td>
                        <td class="px-2 py-2">
                            <img class="w-20 h-20 object-cover"
                                 src="https://images.unsplash.com/photo-1496436818536-e239445d3327?q=80&w=1200"
                                 alt="investment-seed-round" />
                        </td>                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-end mb-4">
    <a href="{{ route('admincontent') }}" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">View Video</a>
</div>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Video Title</th>
            <th scope="col" class="px-6 py-3">Description</th>
            {{-- <th scope="col" class="px-6 py-3">Video</th> --}}
            <th scope="col" class="px-6 py-3">Module</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admincontent as $c)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $c->name }}
                </th>
                   
                <th class="px-6 py-4">
                    {{ implode(' ', array_slice(explode(' ', $c->desc), 0, 8)) }} ...
                </th>
                {{-- <td class="px-2 py-2">
                    <img class="w-20 h-20 object-cover"
                         src="https://images.unsplash.com/photo-1496436818536-e239445d3327?q=80&w=1200"
                         alt="investment-seed-round" />
                </td> --}}
                <th class="px-3 py-2">
                    {{ implode(' ', array_slice(explode(' ', $c->module->name), 0, 3)) }} ...
                </th>                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection