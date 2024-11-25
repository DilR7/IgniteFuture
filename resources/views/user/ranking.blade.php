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
    
    <div class="px-4 sm:px-12 md:px-32 py-4 sm:py-8 bg-gray-100">
        <div class="grid grid-cols-3 gap-4 bg-white p-4 font-bold text-center">
            <div>Rank</div>
            <div>Name</div>
            <div>Point</div>
        </div>

        <div class="grid grid-cols-3">
            @foreach ($points as $index => $point)
                <div
                    class="col-span-3 grid grid-cols-3 gap-4 text-center {{ $index % 2 == 0 ? 'bg-dodger-blue-500 text-white' : 'bg-white text-black' }} p-4">
                    <div class="font-bold text-xl">{{ $index + 1 }}</div>
                    <div>{{ $point->user->name ?? 'Unknown' }}</div>
                    <div>{{ $point->score }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
