@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16 space-x-4"
            x-data="{ isOpen: false, selectedCategory: '{{ $isAllQuiz ? 'All Category' : $category->name }}' }">
            <div class="flex items-center space-x-2">
                <img src="{{ secure_asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="w-44 sm:w-auto mt-2 sm:mt-0">
                <div class="relative w-full sm:w-auto" x-data="{ isOpen: false, selectedCategory: '{{ $selectedCategory }}' }">
                    <button @click="isOpen = !isOpen"
                        class="w-full sm:w-auto text-white bg-dodger-blue-500 hover:bg-dodger-blue-800 focus:ring-4 focus:outline-none focus:ring-dodger-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center justify-between sm:justify-start">
                        <span x-text="selectedCategory"></span>
                        <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l4 4 4-4" />
                        </svg>
                    </button>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full sm:w-auto mt-2 max-h-64 overflow-y-auto">
                        <ul class="py-2 text-sm text-gray-700">
                            <li>
                                <a href="{{ route('quiz') }}" @click="selectedCategory = 'All Category'; isOpen = false;"
                                    class="block px-4 py-2 hover:bg-dodger-blue-200">
                                    All Category
                                </a>
                            </li>
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="{{ route('quizcategory', ['slug' => $cat->slug]) }}"
                                        class="block px-4 py-2 hover:bg-dodger-blue-200">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
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
                        class="hidden sm:block text-dodger-blue-500 font-medium rounded-lg px-3 py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">
                        Log Out
                    </a>
                @else
                    <a href="{{ route('register') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Register</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Log
                        In</a>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 bg-gray-100 pt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  text-black gap-4">
            @foreach ($quizzes as $quiz)
                <a href="javascript:void(0)" class="h-full">
                    <div
                        class="cursor-pointer group relative flex flex-col h-full bg-white shadow-sm border border-slate-200 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="relative m-2.5 overflow-hidden text-white rounded-md">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="card-image"
                                class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110 w-full h-40 object-cover" />
                        </div>
                        <div class="p-4 flex-grow">
                            <div
                                class="mb-4 rounded-md border-2 border-dodger-blue-300 bg-white py-0.5 px-2.5 text-xs text-dodger-blue-800 font-semibold transition-all shadow-sm w-24 text-center">
                                {{ $quiz->Module->Category->name }}
                            </div>
                            <div class="mb-2 text-slate-800 text-lg font-semibold line-clamp-2">
                                {{ $quiz->title }}
                            </div>
                            <h6 class="text-slate-600 leading-normal font-light line-clamp-3">
                                {{ $quiz->desc }}
                            </h6>
                        </div>
                        <div class="flex items-center justify-start p-4">
                            <button onclick="window.location.href='{{ route('quizstart', ['id' => $quiz->id]) }}'"
                                class="rounded-lg bg-blue-700 py-2 px-4 text-white hover:bg-blue-800" type="button">
                                Start Quiz
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4 overflow-x-scroll">
            {{ $quizzes->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
