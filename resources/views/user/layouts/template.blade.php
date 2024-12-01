<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ secure_asset('imgs/Logo.png') }}">
    <title>IgniteFuture</title>
    <style>
        #preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: #ffffff;
            transition: opacity 1s;
            z-index: 10000;
        }

        .bd-loader-wrap {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: 100%;
        }

        .bd-loader-inner {
            position: fixed;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .bd-loader {
            margin-left: 92px;
        }

        @media only screen and (min-width: 576px) and (max-width: 767px),
        (max-width: 575px) {
            .bd-loader {
                transform: scale(0.8);
                margin-left: 66px;
            }
        }

        .bd-loader-item {
            position: absolute;
            width: 6px;
            height: 80px;
            margin-top: -45px;
            border-radius: 0px;
            background-color: #2962ff;
            animation: bd-loader-aim 0.8s infinite;
            animation-direction: alternate-reverse;
        }

        .bd-loader .bd-loader-item:nth-child(1) {
            margin-left: 0px;
        }

        .bd-loader .bd-loader-item:nth-child(2) {
            margin-left: -14px;
            animation-delay: 0.1s;
        }

        .bd-loader .bd-loader-item:nth-child(3) {
            margin-left: -28px;
            animation-delay: 0.2s;
        }

        .bd-loader .bd-loader-item:nth-child(4) {
            margin-left: -42px;
            animation-delay: 0.3s;
        }

        .bd-loader .bd-loader-item:nth-child(5) {
            margin-left: -56px;
            animation-delay: 0.4s;
        }

        .bd-loader .bd-loader-item:nth-child(6) {
            margin-left: -70px;
            animation-delay: 0.5s;
        }

        .bd-loader .bd-loader-item:nth-child(7) {
            margin-left: -84px;
            animation-delay: 0.6s;
        }

        .bd-loader .bd-loader-item:nth-child(8) {
            margin-left: -98px;
            animation-delay: 0.7s;
        }

        @keyframes bd-loader-aim {
            0% {
                height: 2px;
                margin-top: 0;
                transform: rotate(0deg);
            }

            100% {
                height: 80px;
                transform: rotate(0deg);
            }
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="bd-loader-inner">
            <div class="bd-loader">
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
            </div>
        </div>
    </div>
    <div class="bg-dodger-blue-500 w-full h-14 px-4 sm:px-6 lg:px-12 py-4 flex items-center justify-start"
        x-data="{ isOpen: false }">
        <div class="w-full flex items-center justify-between">
            <div class="flex items-center">
                <div class="sm:hidden">
                    <button @click="isOpen = !isOpen" class="text-dodger-blue-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <ul class="hidden sm:flex list-none gap-4 font-medium text-dodger-blue-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('modules') }}" class="hover:text-white">Module</a></li>
                    <li><a href="{{ route('books') }}" class="hover:text-white">Book</a></li>
                    <li><a href="{{ route('quiz') }}" class="hover:text-white">Quiz</a></li>
                    <li><a href="{{ route('ranking') }}" class="hover:text-white">Ranking</a></li>
                </ul>
            </div>
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <a href="" class="flex items-center space-x-2">
                        <span class="text-white font-medium">Hi, {{ $user->name }}</span>
                        <img src="{{ secure_asset('imgs/Profile.png') }}" alt="Profile Image"
                            class="h-8 w-8 rounded-full">
                    </a>
                @else
                @endif
            </div>
        </div>

        <div x-show="isOpen" class="absolute top-14 left-0 w-full bg-dodger-blue-500 z-[9999] p-4"
            @click.away="isOpen = false" x-cloak>
            <ul class="flex flex-col list-none gap-2 font-medium text-white">
                <li><a href="{{ route('home') }}" class="hover:text-gray-300">Home</a></li>
                <li><a href="{{ route('modules') }}" class="hover:text-gray-300">Module</a></li>
                <li><a href="{{ route('books') }}" class="hover:text-gray-300">Book</a></li>
                <li><a href="{{ route('quiz') }}" class="hover:text-gray-300">Quiz</a></li>
                <li><a href="{{ route('ranking') }}" class="hover:text-gray-300">Ranking</a></li>
            </ul>

            <div class="mt-4">
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
        </div>
    </div>

    @yield('main-content')

    <footer class="bg-dodger-blue-500 py-6 px-4 sm:px-6 lg:px-12">
        <div class="w-full mx-auto">
            <!-- Footer Content -->
            <div
                class="flex flex-col items-center sm:flex-row sm:justify-between text-white text-sm space-y-4 sm:space-y-0">
                <!-- Logo and Brand Name -->
                <div class="flex flex-col items-center space-y-2 sm:space-y-0 sm:flex-row sm:space-x-3">
                    <img src="{{ secure_asset('imgs/LogoF.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                    <div class="text-center sm:text-left">
                        <h2 class="font-bold text-lg">IgniteFuture</h2>
                        <p class="text-gray-200 mt-1">
                            Empowering your future, one step at a time.
                        </p>
                    </div>
                </div>

                <!-- Links Section -->
                <div class="flex flex-wrap justify-center space-x-4 sm:space-x-6">
                    <a href="#" class="hover:underline">About</a>
                    <a href="#" class="hover:underline">Contact</a>
                    <a href="#" class="hover:underline">Terms</a>
                    <a href="#" class="hover:underline">Privacy</a>
                </div>
            </div>

            <!-- Bottom Text -->
            <div class="flex justify-center text-gray-300 text-xs mt-4 text-center">
                © 2024 - IgniteFuture. All rights reserved.
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const preloader = document.getElementById("preloader");
            const minimumPreloadTime = 1000;

            const startTime = Date.now();

            window.addEventListener("load", () => {
                if (preloader) {
                    const elapsedTime = Date.now() - startTime;

                    const delay = Math.max(minimumPreloadTime - elapsedTime, 0);

                    setTimeout(() => {
                        preloader.style.opacity = "0";
                        setTimeout(() => {
                            preloader.style.display = "none";
                        }, 1000);
                    }, delay);
                }
            });
        });
    </script>
</body>

</html>
