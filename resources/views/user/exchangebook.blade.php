@extends('user.layouts.template')
@section('main-content')
    <div class="px-32 pb-16">
        <div class="grid grid-cols-4 text-black gap-6 pt-8">
            <div class="flex flex-col gap-3">
                <div>
                    <img src="{{ asset('build/assets/BookPreview.jpg') }}" alt="" class="rounded-xl">
                </div>
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">200 Points</p>
                    <button class="font-medium text-xs p-2 px-4 bg-dodger-blue-500 rounded-lg text-white">REDEEM</button>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <div>
                    <img src="{{ asset('build/assets/BookPreview.jpg') }}" alt="" class="rounded-xl">
                </div>
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">200 Points</p>
                    <button class="font-medium text-xs p-2 px-4 bg-dodger-blue-500 rounded-lg text-white">REDEEM</button>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <div>
                    <img src="{{ asset('build/assets/BookPreview.jpg') }}" alt="" class="rounded-xl">
                </div>
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">200 Points</p>
                    <button class="font-medium text-xs p-2 px-4 bg-dodger-blue-500 rounded-lg text-white">REDEEM</button>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <div>
                    <img src="{{ asset('build/assets/BookPreview.jpg') }}" alt="" class="rounded-xl">
                </div>
                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">200 Points</p>
                    <button class="font-medium text-xs p-2 px-4 bg-dodger-blue-500 rounded-lg text-white">REDEEM</button>
                </div>
            </div>
        </div>
    </div>
@endsection
