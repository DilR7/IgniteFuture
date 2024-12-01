@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16 space-x-4"
            x-data="{ isOpen: false, selectedCategory: '{{ $isAllCategory ? 'All Category' : $category->name }}' }">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="relative hidden sm:block">
                <button @click="isOpen = !isOpen"
                    class="text-white bg-dodger-blue-500 hover:bg-dodger-blue-800 focus:ring-4 focus:outline-none focus:ring-dodger-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center"
                    type="button">
                    <span x-text="selectedCategory"></span>
                    <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l4 4 4-4" />
                    </svg>
                </button>

                <div x-show="isOpen" @click.away="isOpen = false"
                    class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-full mt-2">
                    <ul class="py-2 text-sm text-gray-700">
                        <li>
                            <a href="{{ route('modules') }}" @click="selectedCategory = 'All Category'; isOpen = false"
                                class="block px-2 py-2 hover:bg-dodger-blue-200">All Category</a>
                        </li>
                        @foreach ($categories as $cat)
                            <li>
                                <a href="{{ route('modulecategory', ['slug' => $cat->slug]) }}"
                                    @click="selectedCategory = '{{ $cat->name }}'; isOpen = false"
                                    class="block px-2 py-2 hover:bg-dodger-blue-200">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                    </ul>
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

    </div>

    <div x-data="{ showModal: false, formId: null }" class="px-4 sm:px-8 md:px-16 lg:px-32 bg-gray-100 pt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-black gap-4">
            @foreach ($modules as $module)
                <form id="form-{{ $module->id }}" action="{{ route('contents', ['slug' => $module->slug]) }}"
                    method="POST">
                    @csrf
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
                                {{ $module->Category->name }}
                            </div>
                            <h6 class="mb-2 text-slate-800 text-lg font-semibold line-clamp-2">
                                {{ $module->name }}
                            </h6>
                            <p class="text-slate-600 leading-normal font-light line-clamp-3">
                                {{ $module->desc }}
                            </p>
                        </div>
                        <div class="flex items-center justify-start p-4">
                            <button type="button" @click="showModal = true; formId = 'form-{{ $module->id }}';"
                                class="rounded-lg bg-blue-700 py-2 px-4 text-white hover:bg-blue-800">

                                Enroll Now
                            </button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $modules->links('pagination::tailwind') }}
        </div>

        <div x-show="showModal"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 px-4 sm:px-6 lg:px-8"
            x-cloak>
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                </button>

                <div class="flex justify-center mb-6">
                    <svg class="text-blue-600 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <h2 class="text-lg font-semibold text-center text-gray-700 mb-6">Are you sure you want to enroll this
                    module?</h2>
                <div class="flex justify-center mt-6 space-x-4">
                    <button @click="showModal = false"
                        class="py-3 px-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:ring-4 focus:ring-gray-200">
                        No, Cancel
                    </button>
                    <button @click="document.getElementById(formId).submit();"
                        class="py-3 px-6 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Yes, I'm sure
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
