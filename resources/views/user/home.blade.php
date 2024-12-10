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

            <div class="flex items-center space-x-2 sm:space-x-4">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Log
                        Out</a>
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
    <div class="pl-4 sm:pl-6 lg:pl-12 h-auto flex flex-col lg:flex-row bg-gray-100">
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
                @if (Auth::user())
                @else
                    <button onclick="window.location.href='{{ route('register') }}'"
                        class="bg-dodger-blue-500 w-32 sm:w-24 p-2 text-center rounded-lg text-white font-medium text-sm">
                        JOIN US
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 pb-8 lg:pb-16">
        <div class="py-8 text-center font-semibold text-xl sm:text-2xl">Browse Category</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 text-black gap-4">
            @foreach ($categories as $category)
                <div class="flex flex-col text-center gap-4">
                    <div class="rounded-xl flex gap-2 hover:scale-90 transition-transform duration-300 {{ $category->bgColor }}"
                        style="cursor: default;">
                        <div>
                            <img src="{{ secure_asset($category->img) }}" alt="" class="h-16 sm:h-20 p-4">
                        </div>
                        <div class="flex flex-col items-start justify-center">
                            <p class="font-medium">{{ $category->name }}</p>
                            <p class="text-xs">{{ $category->modules_count }} Modules</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div x-data="{ showModal: false, formId: null }" class="px-4 sm:px-8 md:px-16 lg:px-32 bg-gray-100 pb-16">
        <div class="py-8 text-center font-semibold text-xl sm:text-2xl">Best Modules</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-black gap-4">
            @foreach ($modules as $module)
                <form id="form-{{ $module->id }}" action="{{ route('contents', ['slug' => $module->slug]) }}"
                    method="POST">
                    @csrf
                    <div
                        class="cursor-pointer group relative flex flex-col h-full bg-white shadow-sm border border-slate-200 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="relative m-2.5 overflow-hidden text-white rounded-md">
                            <img src="data:image/png;base64, {{ $module->img }}" alt="Module Image"
                                style="width: 1200px; height: auto; object-fit: cover;"
                                class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110 w-full h-40 sm:h-48 md:h-56 object-cover" />
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

        <div x-show="showModal"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 px-4 sm:px-6 lg:px-8"
            x-cloak>
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                <div class="flex justify-center mb-6">
                    <svg class="text-blue-600 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-center text-gray-700 mb-6">
                    Are you sure you want to enroll in this module?
                </h2>
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

    <div class="px-4 sm:px-8 md:px-16 lg:px-32 pb-16">
        <div class="py-8 text-center font-semibold text-xl sm:text-2xl">Top 3 Students Of The Month</div>

        <div class="flex flex-row items-end justify-center gap-4 text-black">
            @if ($top3->isEmpty())
                <div class="flex flex-col text-center order-2">
                    <div class="relative p-4 rounded-t-lg h-[140px] bg-yellow-400">
                        <img src="{{ secure_asset('imgs/profile.jpg') }}" alt="Placeholder"
                            class="h-24 w-24 mx-auto rounded-full">
                        <div
                            class="absolute bottom-0 px-3 py-1 text-sm rounded-full left-1/2 transform -translate-x-1/2 bg-gray-200">
                            1st
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                        <p class="font-medium">No Data</p>
                        <p class="text-xs text-gray-500 font-normal">N/A</p>
                        <p class="font-semibold">0 <span class="font-normal text-gray-500">Points</span></p>
                    </div>
                </div>

                <div class="flex flex-col text-center order-1">
                    <div class="relative p-4 rounded-t-lg h-[120px] bg-gray-300">
                        <img src="{{ secure_asset('imgs/profile.jpg') }}" alt="Placeholder"
                            class="h-20 w-20 mx-auto rounded-full">
                        <div
                            class="absolute bottom-0 px-3 py-1 text-sm rounded-full left-1/2 transform -translate-x-1/2 bg-gray-200">
                            2nd
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                        <p class="font-medium">No Data</p>
                        <p class="text-xs text-gray-500 font-normal">N/A</p>
                        <p class="font-semibold">0 <span class="font-normal text-gray-500">Points</span></p>
                    </div>
                </div>

                <div class="flex flex-col text-center order-3">
                    <div class="relative p-4 rounded-t-lg h-[100px] bg-gray-300">
                        <img src="{{ secure_asset('imgs/profile.jpg') }}" alt="Placeholder"
                            class="h-20 w-20 mx-auto rounded-full">
                        <div
                            class="absolute bottom-0 px-3 py-1 text-sm rounded-full left-1/2 transform -translate-x-1/2 bg-gray-200">
                            3rd
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                        <p class="font-medium">No Data</p>
                        <p class="font-semibold">0 <span class="font-normal text-gray-500">Points</span></p>
                    </div>
                </div>
            @else
                @foreach ($top3 as $index => $student)
                    <div
                        class="flex flex-col text-center {{ $index == 0 ? 'order-2' : ($index == 1 ? 'order-1' : 'order-3') }}">
                        <div
                            class="relative p-4 rounded-t-lg {{ $index == 0 ? 'h-[140px] bg-yellow-400' : ($index == 1 ? 'h-[120px] bg-gray-300' : 'h-[100px] bg-yellow-700') }}">
                            <img src="data:image/jpeg;base64, {{ $student->user->profile_picture }}" alt="{{ $student->user->profile_picture }}"
                                class="h-20 w-20 sm:h-24 sm:w-24 mx-auto rounded-full object-cover">
                            <div
                                class="absolute bottom-0 px-3 py-1 text-sm rounded-full left-1/2 transform -translate-x-1/2 bg-gray-50">
                                {{ $index + 1 }}{{ $index == 0 ? 'st' : ($index == 1 ? 'nd' : 'rd') }}
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                            <p class="font-medium">{{ $student->user->name }}</p>
                            <p class="font-semibold">{{ $student->score }} <span
                                    class="font-normal text-gray-500">Points</span></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
