@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
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


    <div class="px-4 sm:px-8 md:px-16 lg:px-32 bg-gray-100 py-8">
        <div x-data="{ showModal: false }" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-8 gap-2">
            <div class="flex flex-col text-center gap-4 col-span-1 md:col-span-2 lg:col-span-6  order-2 lg:order-1">
                <div class="flex flex-col items-start border-2 border-blue-500 rounded-lg">
                    <div class="flex flex-col p-4 gap-4">
                        <div class="flex justify-between w-full ">
                            <div class="font-bold">Title:</div>
                            <div>{{ $quizzes->title }}</div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="font-bold">Time Limit:</div>
                            <div>10 Mins</div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="font-bold">Attempts:</div>
                            <div>Unlimited</div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="font-bold">Pass Points:</div>
                            <div>60 Points</div>
                        </div>
                        <div class="flex flex-col w-full">
                            <div class="text-justify leading-relaxed">{{ $quizzes->desc }}</div>
                        </div>
                    </div>
                    <div class="w-full text-center  flex justify-center pl-4 pb-4">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="block text-white justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-2"
                            type="button">
                            Start Quiz
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col text-center gap-2 col-span-1 md:col-span-2 lg:col-span-2  order-1 lg:order-2">
                <div class="flex flex-col bg-blue-500 rounded-lg">
                    <div class="flex justify-between">
                        <div class="text-white w-full p-4 font-bold">Achievements</div>
                    </div>
                    <div class="flex flex-wrap gap-4 px-4 pb-4">
                        @foreach ($achievements as $achievement)
                            <div class="flex items-center justify-between bg-white rounded-lg shadow p-2 px-6 w-full">
                                <div class="text-black font-medium">{{ $achievement->name }}</div>
                                <img src="{{ asset($achievement->image) }}" alt="{{ $achievement->name }}"
                                    class="w-10 h-10 object-cover mr-2">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                                start
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
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.getElementById('redirectButton').addEventListener('click', function() {
            window.location.href = '{{ route('question', ['id' => $quizzes->id]) }}';
        });
    </script>
@endsection
