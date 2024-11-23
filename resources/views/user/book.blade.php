@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="flex-1 mx-4 hidden sm:flex">
                <div class="relative w-full">
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="What do you want to learn...">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.172 4.414l4.95 4.95a1 1 0 01-1.414 1.414l-4.95-4.95A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center space-x-2 sm:space-x-4">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Log
                        Out</a>
                @else
                    <a href="{{ route('register') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Create
                        Account</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Sign
                        In</a>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 bg-gray-100 pt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-black gap-4">
            @foreach ($books as $book)
                <div
                    class="cursor-pointer group relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="relative m-2.5 overflow-hidden text-white rounded-md">
                        <img class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                            src="https://images.unsplash.com/photo-1496436818536-e239445d3327?q=80&w=1200"
                            alt="investment-seed-round" />
                    </div>
                    <div class="p-4">
                        <h6 class="mb-2 text-slate-800 text-xl font-semibold line-clamp-1">
                            {{ $book->name }}
                        </h6>
                        <p class="text-slate-600 leading-normal font-light line-clamp-3">
                            {{ $book->desc }}
                        </p>
                    </div>
                    <div class="flex items-center justify-start p-4">
                        <button onclick="window.location.href='{{ route('readbook', ['slug' => $book->slug]) }}'"
                            class="rounded-lg bg-blue-700 py-2 px-4 text-white hover:bg-blue-800" type="button">
                            Read book
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
