@php
    $colors = ['bg-green-100', 'bg-blue-100', 'bg-yellow-100', 'bg-red-100', 'bg-purple-100'];
@endphp
@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
            <div class="flex pr-4">
                <img>
                <p class="font-bold text-xl">IgniteFuture</p>
            </div>

            <div class="flex-1 mx-4">
                <div class="relative">
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

            <div class="flex items-center space-x-4">
                <a href="#"
                    class="text-cornflower-blue-500 font-semibold rounded-lg px-4 py-2 bg-cornflower-blue-200 hover:bg-cornflower-blue-500">Create
                    Account</a>
                <a href="#"
                    class="bg-cornflower-blue-500 text-white px-4 py-2 rounded-lg hover:bg-cornflower-blue-700">Sign In</a>
            </div>

        </div>
    </div>
    <div class="pl-32 h-auto flex bg-gray-100">
        <div class="grid grid-cols-2 text-black">
            <div class='flex flex-col gap-5 py-32 mr-20'>
                <div class="text-5xl font-medium">Learn with Expert <span class="text-cornflower-blue-400">Anytime</span>
                    <span class="text-cornflower-blue-500">Anywhere</span>
                </div>
                <div class="text-base font-medium">Our mision is to help people to find the best course online and learn
                    with expert anytime, anywhere
                </div>
                <buton class="bg-cornflower-blue-500 w-24 p-2 text-center rounded-lg text-white font-medium text-sm">JOIN US
                </buton>
            </div>
            <div class="flex justify-end">
                <img src="{{ asset('build/assets/logo2.jpg') }}" alt="" class="">
            </div>
        </div>
    </div>

    <div class="px-32 pb-16 ">
        <div class="py-8 text-center font-semibold text-2xl">Browse Category</div>
        <div class="grid grid-cols-4 text-black gap-4">
            @foreach ($categories as $category)
                <div class="flex flex-col text-center gap-4">
                    <a class="rounded-xl flex gap-2 hover:cursor-pointer {{ $category->bgColor }}" href="">
                        <div>
                            <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                        </div>
                        <div class="flex flex-col items-start justify-center ">
                            <p class="font-medium">{{ $category->name }}</p>
                            <p class="text-xs">200 Courses</p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    </div>

    


    <div class="px-32 pb-16 bg-gray-100">
        <div class="py-8 text-center font-semibold text-2xl">Best Modules</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-black gap-4">
            @foreach ($modules as $module)
                <a href="javascript:void(0)" class="h-full">
                    <div
                        class=" cursor-pointer group relative flex flex-col h-full bg-white shadow-sm border border-slate-200 rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="relative m-2.5 overflow-hidden text-white rounded-md">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="card-image"
                                class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110" />
                        </div>
                        <div class="p-4 flex-grow">
                            <div
                                class="mb-4 rounded-md border-2 border-dodger-blue-300 bg-white py-0.5 px-2.5 text-xs text-dodger-blue-800 font-bold transition-all shadow-sm w-24 text-center">
                                {{ $module->Category->name }}
                            </div>

                            <h6 class="mb-2 text-slate-800 text-xl font-semibold line-clamp-2">
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
        <div class="py-8 text-center font-semibold text-2xl">Top Student Of The month</div>
        <div class="grid grid-cols-5 text-black gap-4">
            <div class="flex flex-col text-center">
                <div>
                    <img src="{{ asset('build/assets/TopStudent.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-center justify-center border-x-2 p-2 border-gray-100">
                    <p class="font-medium">Eric</p>
                    <p class="text-xs text-gray-500 font-normal">SMA 1</p>
                </div>
                <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                    <p class="font-semibold ">100 <span class="font-normal text-gray-500">Point</span></p>
                </div>
            </div>

            <div class="flex flex-col text-center">
                <div>
                    <img src="{{ asset('build/assets/TopStudent.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-center justify-center border-x-2 p-2 border-gray-100">
                    <p class="font-medium">Eric</p>
                    <p class="text-xs text-gray-500 font-normal">SMA 1</p>
                </div>
                <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                    <p class="font-semibold ">100 <span class="font-normal text-gray-500">Point</span></p>
                </div>
            </div>

            <div class="flex flex-col text-center">
                <div>
                    <img src="{{ asset('build/assets/TopStudent.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-center justify-center border-x-2 p-2 border-gray-100">
                    <p class="font-medium">Eric</p>
                    <p class="text-xs text-gray-500 font-normal">SMA 1</p>
                </div>
                <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                    <p class="font-semibold ">100 <span class="font-normal text-gray-500">Point</span></p>
                </div>
            </div>

            <div class="flex flex-col text-center">
                <div>
                    <img src="{{ asset('build/assets/TopStudent.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-center justify-center border-x-2 p-2 border-gray-100">
                    <p class="font-medium">Eric</p>
                    <p class="text-xs text-gray-500 font-normal">SMA 1</p>
                </div>
                <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                    <p class="font-semibold ">100 <span class="font-normal text-gray-500">Point</span></p>
                </div>
            </div>

            <div class="flex flex-col text-center">
                <div>
                    <img src="{{ asset('build/assets/TopStudent.jpg') }}" alt="" class="">
                </div>
                <div class="flex flex-col items-center justify-center border-x-2 p-2 border-gray-100">
                    <p class="font-medium">Eric</p>
                    <p class="text-xs text-gray-500 font-normal">SMA 1</p>
                </div>
                <div class="flex flex-col items-center justify-center border-2 p-2 text-sm border-gray-100">
                    <p class="font-semibold ">100 <span class="font-normal text-gray-500">Point</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
