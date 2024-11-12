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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 mx-4">
                <div class="relative">
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="What do you want to learn...">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-1/2 right-4 transform -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1111.172 4.414l4.95 4.95a1 1 0 01-1.414 1.414l-4.95-4.95A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <a href="#" class="text-cornflower-blue-500 font-semibold rounded-lg px-4 py-2 bg-cornflower-blue-200 hover:bg-cornflower-blue-500">Create Account</a>
                <a href="#" class="bg-cornflower-blue-500 text-white px-4 py-2 rounded-lg hover:bg-cornflower-blue-700">Sign In</a>
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
                            <button @click="showModal = true" class="p-2 bg-blue-500 text-white rounded-md font-light mt-4 w-[14vw]">Start Quiz</button>
                        </div>
                        <div class="flex flex-col items-start gap-y-4">
                            <div>28/07/2021</div>
                            <div>15 Mins</div>
                            <div>Twice</div>
                            <div>80 Points</div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full py-4 px-4 border-x-2 text-xs gap-2">
                    <div class="flex text-start font-medium">One of the most efficient ways to protect against cyber attacks and all types of data breaches is to train your employees on cyber attack prevention and</div>
                    <br>
                    <div class="flex text-start font-medium">The quiz consists of questions. To be successful with the quizzes, it’s important to conversant with the topic by paying attention to the short video</div>
                    <div class="flex text-start font-medium">To start, click the "Start" button. When finished, click the "Submit" button.</div>
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
                    <div><img src="{{ asset('storage/Badge1.png') }}" alt="Image"><div class="text-white">Comeback</div></div>
                    <div><img src="{{ asset('storage/Badge2.png') }}" alt="Image"><div class="text-white">Winner</div></div>
                    <div><img src="{{ asset('storage/Badge3.png') }}" alt="Image"><div class="text-white">Lucky</div></div>
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
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
            <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/2 lg:w-1/3">
                <h2 class="text-lg font-semibold">Quiz Modal</h2>
                <p class="mt-4">Ayoo quizzzez</p>
                <!-- Close Modal Button -->
                <div class="flex justify-between">
                    <button @click="showModal = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Cancel</button>
                    <button @click="showModal = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Start</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
