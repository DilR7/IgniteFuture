<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="flex h-screen">
        <div class="flex w-1/2 h-screen justify-center items-center flex-col ">
            <div class="flex items-center justify-start w-full px-12">
                <img src="{{ asset('build/assets/logo.png') }}" alt="Your Logo" class="h-10 w-10 mr-2">
                <span class="text-base font-semibold text-gray-900">Ignite Future</span>
            </div>
            <div class="px-24 w-full py-[34px]">
                <div class="font-semibold w-full mb-4">
                    <div class="text-xl">Welcome to Ignite Future</div>
                    <div class="text-sm text-gray-400 font-medium">Register An Account</div>
                </div>
                <form method="POST" action="{{ route('register') }}" class="w-full">
                    @csrf

                    <!-- Name -->
                    <div>
                        <div class="flex gap-2 flex-row items-center">
                            <label for="name" class="text-primary text-sm font-semibold">{{ __('Name') }}</label>
                            <x-input-error :messages="$errors->get('name')" class="text-xs font-semibold" />
                        </div>

                        <input id="name" class="block mt-1 w-full rounded-md border-1 h-8" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />

                    </div>

                    <!-- Email Address -->
                    <div class="mt-2">
                        <div class="flex gap-2 flex-row items-center">
                            <label for="email" class="text-primary text-sm font-semibold">{{ __('Email') }}</label>
                            <x-input-error :messages="$errors->get('email')" class="text-xs font-semibold" />
                        </div>
                        <input id="email" class="block mt-1 w-full rounded-md border-1 h-8" type="email"
                            name="email" :value="old('email')" required autocomplete="email" />

                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <div class="flex gap-2 flex-row items-center">
                            <label for="password"
                                class="text-primary text-sm font-semibold">{{ __('Password') }}</label>
                            <x-input-error :messages="$errors->get('password')" class="text-xs font-semibold" />
                        </div>

                        <input id="password" class="block mt-1 w-full rounded-md border-1 h-8" type="password"
                            name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <div class="flex gap-2 flex-row items-center">
                            <label for="password_confirmation"
                                class="text-primary text-sm font-semibold">{{ __('Confirm Password') }}</label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-xs font-semibold" />
                        </div>

                        <input id="password_confirmation" class="block mt-1 w-full rounded-md border-1 h-8"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex flex-col items-center gap-1 mt-4">
                        <button class="block w-full rounded-md border h-8 bg-black text-white">
                            {{ __('Register') }}
                        </button>
                        <a class=" text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex w-1/2 h-screen gap-4 pt-4">
            <img src="{{ asset('build/assets/RBanner1.jpg') }}" alt="Bottom Right Image" class="h-4/6 w-48 rounded-2xl">
            <img src="{{ asset('build/assets/RBanner2.jpg') }}" alt="Top Left Image" class="mt-20 h-4/6 w-48 rounded-2xl">
            <img src="{{ asset('build/assets/RBanner3.jpg') }}" alt="Bottom Right Image" class="mt-40 h-4/6 w-48 rounded-2xl">
        </div>
    </div>
</body>
</html>
