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
    <div x-data="{ showModal: false }" class="w-full">
        <!-- Courses Section -->
        <div class="flex flex-col gap-4 m-2">
            <div class="flex flex-col border-2 border-blue-500 rounded-lg">
                <div class="items-start">
                    <div class="flex w-full p-4 font-bold">Question 1</div>
                    <div class="ml-4">You see a non-familiar face in the access-controlled areas of our office, the person
                        does not have the MGL ID/Visitor/Staff/Vendor tag with him. What would you do?</div>
                </div>
                <div class="ml-4 flex flex-col mt-4 mb-4">
                    <button type="button"
                        class="m-4 h-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Light</button>
                    <button type="button"
                        class="m-4 h-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Light</button>
                    <button type="button"
                        class="m-4 h-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Light</button>
                    <button type="button"
                        class="m-4 h-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-blue-4x00 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Light</button>
                </div>

                <div class="ml-4 flex justify-between mt-4 mb-4">
                    <button class="p-2 bg-blue-500 text-white mx-4 rounded-md font-medium">Previous</button>
                    <button class="p-2 bg-blue-500 text-white mx-4 rounded-md font-medium">Next</button>
                </div>

            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
