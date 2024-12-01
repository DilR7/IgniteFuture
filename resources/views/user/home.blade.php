@php
    $colors = ['bg-green-100', 'bg-blue-100', 'bg-yellow-100', 'bg-red-100', 'bg-purple-100'];
@endphp
@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ secure_asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
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
    <div class="px-4 sm:px-8 lg:pl-32 h-auto flex flex-col lg:flex-row bg-gray-100">
        <div class="grid grid-cols-1 lg:grid-cols-2 text-black w-full">
            <div class="flex justify-center lg:justify-end mt-8 lg:mt-0 order-1 lg:order-2">
                <img src="{{ secure_asset('imgs/logo2.jpg') }}" alt="Logo"
                    class="w-full sm:w-full lg:w-full max-w-xs lg:max-w-full">
            </div>

            <div
                class="flex flex-col gap-5 py-8 lg:py-32 lg:mr-20 items-center lg:items-start text-center lg:text-left order-2 lg:order-1">
                <div class="text-3xl sm:text-4xl lg:text-5xl font-medium">
                    Learn with Expert
                    <span class="text-dodger-blue-400">Anytime</span>
                    <span class="text-dodger-blue-500">Anywhere</span>
                </div>
                <div class="text-sm sm:text-base font-medium max-w-md">
                    Our mission is to help people to find the best course online and learn
                    with experts anytime, anywhere.
                </div>
                <button class="bg-dodger-blue-500 w-32 sm:w-24 p-2 text-center rounded-lg text-white font-medium text-sm">
                    JOIN US
                </button>
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 pb-8 lg:pb-16">
        <div class="py-8 text-center font-semibold text-xl sm:text-2xl">Browse Category</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 text-black gap-4">
            @foreach ($categories as $category)
                <div class="flex flex-col text-center gap-4">
                    <a class="rounded-xl flex gap-2 hover:cursor-pointer {{ $category->bgColor }}" href="">
                        <div>
                            <img src="{{ secure_asset($category->img) }}" alt="" class="h-16 sm:h-20 p-4">
                        </div>
                        <div class="flex flex-col items-start justify-center">
                            <p class="font-medium">{{ $category->name }}</p>
                            <p class="text-xs">200 Courses</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 pb-8 lg:pb-16 bg-gray-100">
        <div class="py-8 text-center font-semibold text-xl sm:text-2xl">Best Modules</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 text-black gap-4">
            @foreach ($modules as $module)
                <a href="javascript:void(0)" class="h-full">
                    <div
                        class="cursor-pointer group relative flex flex-col h-full bg-white shadow-sm border border-slate-200 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="relative m-2.5 overflow-hidden text-white rounded-md">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="card-image"
                                class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110 w-full h-40 sm:h-48 md:h-56 object-cover" />
                        </div>
                        <div class="p-4 flex-grow">
                            <div
                                class="mb-4 rounded-md border-2 border-dodger-blue-300 bg-white py-0.5 px-2.5 text-xs text-dodger-blue-800 font-bold transition-all shadow-sm w-24 text-center">
                                {{ $module->Category->name }}
                            </div>

                            <h6 class="mb-2 text-slate-800 text-lg sm:text-xl font-semibold line-clamp-2">
                                {{ $module->name }}
                            </h6>
                            <p class="text-slate-600 leading-normal font-light line-clamp-3">
                                {{ $module->desc }}
                            </p>
                        </div>
                        <div class="flex items-center justify-start p-4">
                            <button
                                class="rounded-lg bg-dodger-blue-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="px-32 pb-16">
        <div class="py-8 text-center font-semibold text-2xl">Top 3 Students Of The Month</div>
        <div class="flex items-end justify-center gap-4 text-black">
            @foreach ($top3 as $index => $student)
                <div class="flex flex-col text-center">
                    <!-- Set different heights for podium positions -->
                    <div class="relative p-4 rounded-t-lg"
                        style="height: {{ 200 - $index * 30 }}px; background-color: {{ $index == 0 ? '#fcd34d' : '#e5e7eb' }};">
                        <img src="{{ secure_asset('path/to/student/images/' . $student->profile_image) }}"
                            alt="{{ $student->name }}" class="h-24 w-24 mx-auto rounded-full">
                        <div
                            class="absolute bottom-0 px-3 py-1 text-sm rounded-full left-1/2 transform -translate-x-1/2 bg-gray-200">
                            {{ $index + 1 }}{{ $index == 0 ? 'st' : ($index == 1 ? 'nd' : 'rd') }}
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                        <p class="font-medium">{{ $student->name }}</p>
                        <p class="text-xs text-gray-500 font-normal">{{ $student->school }}</p>
                        <p class="font-semibold">{{ $student->points }} <span
                                class="font-normal text-gray-500">Points</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
