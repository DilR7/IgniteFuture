@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
            <div class="flex pr-4">
                <img>
                <p class="font-bold text-xl">IgniteFuture</p>
            </div>


            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                {{ $isAllQuiz ? 'All Quiz' : $category->name }}
                {{-- {{ $category->name }} --}}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>


            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href=""
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All
                            Category</a>
                    </li>
                
                        @foreach ($category  as  $category)
                            <li>
                                <a href=""
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                            </li>
                        @endforeach
                   
                </ul>
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

    <div class="px-32 bg-gray-100 pt-5">
        <div class="grid grid-cols-4 text-black gap-4">
            @foreach ($modules as $modules)
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
                                {{ $modules->Category->name }}
                            </div>
                            <div
                                class="text-start mb-4 rounded-md bg-white py-0.5 text-xs text-dodger-blue-800 font-bold transition-all">
                                {{ $modules->Quiz->title }}
                            </div>
                            <h6 class="mb-2 text-slate-800 text-md font-semibold line-clamp-2">
                                {{ $modules->Quiz->desc }}
                            </h6>
                        </div>
                        <div class="flex items-center justify-start p-4">
                            <button
                                class="rounded-lg bg-dodger-blue-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Start Quiz
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class='mt-5'>
            {{ $quiz->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
