@php
    $colors = ['bg-green-100', 'bg-blue-100', 'bg-yellow-100', 'bg-red-100', 'bg-purple-100'];
@endphp
@extends('user.layouts.template')

@section('main-content')
    <!-- Main Navigation Bar -->
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
                    class="text-dodger-blue-500 font-semibold rounded-lg px-4 py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500">Create
                    Account</a>
                <a href="#" class="bg-dodger-blue-500 text-white px-4 py-2 rounded-lg hover:bg-dodger-blue-700">Sign
                    In</a>
            </div>
        </div>
    </div>

    <!-- Main Content Area with Modal Integration -->
    <div x-data="{ showModal: false }" class="grid grid-cols-8">
        <!-- Courses Section -->
        <div class="flex flex-col text-center gap-4 col-span-6 m-2">
            <div class="flex flex-col items-start border-2 border-blue-500 rounded-lg">
                <div class="flex items-start w-full p-4 font-bold">My Courses</div>
                <div class="flex flex-row">
                    <div class="ml-4">
                        <img src="{{ asset('storage/BookPreview.png') }}" alt="Image">
                    </div>

                    <div class="ml-4 flex flex-row gap-x-4">
                        <div class="flex flex-col items-start gap-y-4">
                            <div>Date</div>
                            <div>Time Limit</div>
                            <div>Twice</div>
                            <div>Pass Points</div>
                            <!-- Start Quiz Button to Trigger Modal -->
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Start Quiz
                            </button>
                        </div>
                        <div class="flex flex-col items-start gap-y-4">
                            <div>{{ $quizzes->created_at }}</div>
                            <div>10 Mins</div>
                            <div>Twice</div>
                            <div>100 Points</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full py-4 px-4 border-x-2 text-xs gap-2">
                    <div class="flex text-start font-medium">{{ $quizzes->title }}</div>
                    <br>
                    <div class="flex text-start font-medium">{{ $quizzes->desc }}</div>
                    <div class="flex text-start font-medium">" Coward already failed before he fail " - Eric</div>
                </div>
            </div>
        </div>

        <!-- Achievements Section -->
        <div class="flex flex-col text-center gap-2 col-span-2 m-2">
            <div class="flex flex-col border-2 bg-blue-500 rounded-lg">
                <div class="flex justify-between">
                    <div class="text-white w-full p-4 font-bold">Achievements</div>
                    <div class="text-white w-full p-4 font-bold">View All</div>
                </div>
                <div class="flex flex-row justify-center">
                    <div><img src="{{ asset('storage/Badge1.png') }}" alt="Image">
                        <div class="text-white">Comeback</div>
                    </div>
                    <div><img src="{{ asset('storage/Badge2.png') }}" alt="Image">
                        <div class="text-white">Winner</div>
                    </div>
                    <div><img src="{{ asset('storage/Badge3.png') }}" alt="Image">
                        <div class="text-white">Lucky</div>
                    </div>
                </div>
                <div class="flex flex-col text-start text-white pl-4 mt-2 mb-2 font-bold">
                    <div class="bg-white ml-4 mr-4 h-[2px]"></div>
                    <div class="mt-2">Max Points : 100</div>
                    <div class="mt-2">Max Points : 70</div>
                    <div class="mt-2">Max Points : 100</div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-blue-800 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to start
                            quiz?</h3>
                        <button id="redirectButton" type="button"
                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.getElementById('redirectButton').addEventListener('click', function() {
            window.location.href = "{{ route('question') }}";
        });
    </script>
@endsection
