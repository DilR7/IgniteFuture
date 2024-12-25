@extends('user.layouts.template')
@section('main-content')
    <div class="bg-white border-b-2 border-dodger-blue-300">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <img src="{{ secure_asset('imgs/Logo.png') }}" alt="Logo" class="h-10 w-10 sm:h-12 sm:w-12">
                <p class="font-bold text-lg sm:text-xl">Ignite<span class="text-dodger-blue-500">Future</span></p>
            </div>

            <div class="flex items-center space-x-2 sm:space-x-4">
                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Log
                        Out</a>
                @else
                    <a href="{{ route('register') }}"
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Register</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Log
                        In</a>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 lg:px-32 py-8 grid grid-cols-1 lg:grid-cols-4 gap-4 bg-gray-100">
        <div class="lg:col-span-1 border-dodger-blue-400 border rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4">My Modules</h2>
            <ul class="space-y-2 overflow-y-auto" style="max-height: 475px;">
                @foreach ($listCourse as $course)
                    <li class="flex items-center space-x-4 p-2 hover:bg-gray-200 rounded-lg">
                        <a href="{{ route('mycontents', ['module_id' => $course->id]) }}"
                            class="flex items-center space-x-4 prevent-jump">
                            <img src="data:image/png;base64, {{ $course->img }}" alt="Course Image"
                                class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <h3 class="font-medium text-sm line-clamp-2">{{ $course->name }}</h3>
                                <p class="text-xs text-gray-500">{{ $course->contents_count }} Videos</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="lg:col-span-2 border-dodger-blue-400 border rounded-lg">
            <video id="main-video" class="w-full rounded-t-lg" controls>
                <source src="{{ secure_asset($mainContent->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-2">
                <h2 class="mt-4 font-semibold text-xl">{{ $mainContent->name ?? '' }}</h2>
                <p class="text-gray-600">{{ $mainContent->desc ?? '' }}</p>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-8">
            <div class="border-dodger-blue-400 border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Videos</h2>
                <ul class="space-y-2 overflow-y-auto" style="max-height: 400px;">
                    @foreach ($contents as $content)
                        <li class="flex items-center space-x-2">
                            @php
                                $isWatched = $content
                                    ->users()
                                    ->where('user_id', Auth::id())
                                    ->wherePivot('completed', true)
                                    ->exists();
                            @endphp
                            <img src="{{ secure_asset($isWatched ? 'imgs/check.png' : 'imgs/uncheck.png') }}"
                                alt="Status" class="h-4 w-4">
                            <span class="text-sm font-semibold">{{ $loop->iteration }}.</span>
                            <a href="{{ route('othercontents', ['slug' => $content->slug]) }}"
                                class="text-black flex items-center">
                                <span class="text-sm line-clamp-1">{{ $content->name }}</span>
                                <span id="video-duration-{{ $content->id }}" class="ml-2 text-gray-500"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border-dodger-blue-400 border rounded-lg p-4" x-data="{ showModal: false, selectedFormId: null }">
                <h2 class="text-lg font-semibold mb-4">Related Modules</h2>
                <ul class="space-y-2">
                    @foreach ($relatedModule as $relatedCourse)
                        <li class="flex flex-col gap-4 border border-dodger-blue-700 rounded-lg">
                            <form id="redirectForm-{{ $relatedCourse->id }}"
                                action="{{ route('contents', ['slug' => $relatedCourse->slug]) }}" method="POST">
                                @csrf
                                <div class="relative overflow-hidden text-white rounded-md">
                                    <img src="data:image/png;base64, {{ $relatedCourse->img }}" alt="card-image"
                                        class="transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110 w-full h-24 object-cover" />
                                </div>
                                <div class="p-2">
                                    <span class="text-sm text-black hover:underline cursor-pointer line-clamp-1"
                                        @click="showModal = true; selectedFormId = 'redirectForm-{{ $relatedCourse->id }}';">
                                        {{ $relatedCourse->name }}
                                    </span>
                                    <p class="text-xs text-gray-500">{{ $relatedCourse->contents_count }} Videos</p>
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <div x-show="showModal" x-cloak
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                        <div class="flex justify-center mb-6">
                            <svg class="text-blue-600 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>

                        <h2 class="text-lg font-semibold text-center text-gray-700 mb-6">Are you sure you want to enroll
                            this
                            module?</h2>
                        <div class="flex justify-center mt-6 space-x-4">
                            <button @click="showModal = false"
                                class="py-3 px-6 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:ring-4 focus:ring-gray-200">
                                No, Cancel
                            </button>
                            <button @click="document.getElementById(selectedFormId).submit();"
                                class="py-3 px-6 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('main-video').addEventListener('ended', function() {
            fetch('{{ route('contents.markWatched', ['id' => $mainContent->id ?? 0]) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => console.log(data.message))
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
