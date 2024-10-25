@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
            <div class="flex pr-4">
                <img>
                <p class="font-bold text-xl">IgniteFuture</p>
            </div>

            <div class="relative">
                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md flex items-center">
                    <span>Browse</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
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
            <div class="flex flex-col text-center gap-4">
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-green-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-red-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>

            </div>

            <div class="flex flex-col text-center gap-4">
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-blue-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-yellow-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>

            </div>

            <div class="flex flex-col text-center gap-4">
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-orange-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-lime-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>

            </div>

            <div class="flex flex-col text-center gap-4">
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-teal-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>
                <a class="rounded-xl flex gap-2 hover:cursor-pointer bg-fuchsia-100" href="">
                    <div>
                        <img src="{{ asset('build/assets/Physics.png') }}" alt="" class="h-20 p-4">
                    </div>
                    <div class="flex flex-col items-start justify-center ">
                        <p class="font-medium">Physics</p>
                        <p class="text-xs">200 Courses</p>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <div class="px-32 py-16 bg-cornflower-blue-500">
        <div class="grid grid-cols-10 text-black gap-4">
            <div class="flex flex-col text-start gap-4 col-span-4 pr-4">
                <p class="text-2xl font-medium text-white">Start Learning with 67.1k students around the world.</p>
                <div class="text-white flex gap-4 text-sm">
                    <button class="bg-cornflower-blue-700 p-2 px-3 rounded-md">Join The Family</button>
                    <button class="bg-cornflower-blue-700 p-2 px-3 rounded-md">Browse All Courses</button>
                </div>
            </div>

            <div class="flex flex-col text-start gap-2 col-span-2 justify-center">
                <p class="text-white text-2xl font-semibold">6.3k </p>
                <p class="text-gray-300 text-xs">Online Courses </p>
            </div>

            <div class="flex flex-col text-start gap-2 col-span-2 justify-center">
                <p class="text-white text-2xl font-semibold">6.3k </p>
                <p class="text-gray-300 text-xs">Online Courses </p>
            </div>

            <div class="flex flex-col text-start gap-2 col-span-2 justify-center">
                <p class="text-white text-2xl font-semibold">6.3k </p>
                <p class="text-gray-300 text-xs">Online Courses </p>
            </div>
        </div>
    </div>


    <div class="px-32 pb-16 bg-gray-100">
        <div class="py-8 text-center font-semibold text-2xl">Best Selling Courses</div>
        <div class="grid grid-cols-3 text-black gap-4">
            <div class="flex flex-col gap-4">
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>

            </div>

            <div class="flex flex-col gap-4">
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>

            </div>
            <div class="flex flex-col gap-4">
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>
                <a class="rounded-xl items-center flex flex-col hover:cursor-pointer bg-white" href="">
                    <div>
                        <img src="{{ asset('build/assets/Course1.jpg') }}" alt="" class="">
                    </div>
                    <div class="flex flex-col p-2 gap-1">
                        <div class="font-medium">New Feature Available on Devias</div>
                        <div class="text-xs font-light">It is a long established fact that a reader will be distracted by
                            the readable
                            content of a page when looking at its layout.</div>
                        <div class="text-xs font-medium flex gap-2 mt-1">
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                            <button class="rounded-md p-1 bg-gray-300">fdaf</button>
                        </div>
                    </div>
                </a>
            </div>

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
