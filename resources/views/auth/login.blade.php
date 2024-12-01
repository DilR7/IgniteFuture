<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Left Section (Login Form) -->
        <div class="flex flex-col lg:w-1/2 h-screen justify-center items-center">
            <div class="px-6 md:px-16 lg:px-24 w-full">
                <div class="flex flex-col items-center justify-center w-full pb-8">
                    <img src="{{ secure_asset('imgs/Logo.png') }}" alt="Your Logo" class="h-10 w-10 md:h-12 md:w-12">
                    <p class="font-bold text-lg">
                        Ignite<span class="text-dodger-blue-500">Future</span>
                    </p>
                </div>

                <div class="font-semibold w-full mb-2">
                    <div class="text-black font-bold text-lg sm:text-xl">Login to Your Account</div>
                </div>
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <div class="flex gap-2 flex-row items-center">
                            <label for="email" class="text-primary text-sm font-semibold">{{ __('Email') }}</label>
                            <x-input-error :messages="$errors->get('email')" class="text-xs font-semibold" />
                        </div>
                        <input id="email" class="block mt-1 w-full rounded-md border-1 h-8" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <div class="flex gap-2 flex-row items-center">
                            <label for="password"
                                class="text-primary text-sm font-semibold">{{ __('Password') }}</label>
                            <x-input-error :messages="$errors->get('password')" class="text-xs font-semibold" />
                        </div>
                        <input id="password" class="block mt-1 w-full rounded-md border-1 h-8" type="password"
                            name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="flex justify-between items-center mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit and Register Link -->
                    <div class="flex flex-col items-center gap-1 mt-4">
                        <button
                            class="block w-full rounded-md border h-8 bg-dodger-blue-600 text-white hover:bg-dodger-blue-800">
                            {{ __('Log in') }}
                        </button>
                        <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('register') }}">
                            {{ __('Haven\'t Registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Section (Responsive Images) -->
        <div class="hidden lg:flex lg:w-1/2 h-screen gap-4 pt-4 overflow-hidden">
            <img src="{{ secure_asset('imgs/RBanner1.jpg') }}" alt="Image 1" class="flex-1 h-4/6 w-48 rounded-2xl">
            <img src="{{ secure_asset('imgs/RBanner2.jpg') }}" alt="Image 2"
                class="flex-1 mt-20 h-4/6 w-48 rounded-2xl">
            <img src="{{ secure_asset('imgs/RBanner3.jpg') }}" alt="Image 3"
                class="flex-1 mt-40 h-4/6 w-48 rounded-2xl">
        </div>
    </div>
</body>

</html>
