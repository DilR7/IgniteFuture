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
                        class="text-dodger-blue-500 font-medium rounded-lg px-3 py-2 sm:px-4 sm:py-2 bg-dodger-blue-200 hover:bg-dodger-blue-500 hover:text-white">Create
                        Account</a>
                    <a href="{{ route('login') }}"
                        class="bg-dodger-blue-500 font-medium text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg hover:bg-dodger-blue-900">Sign
                        In</a>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-8 lg:px-32 py-8 grid grid-cols-1 lg:grid-cols-4 gap-4 bg-gray-100">
        <div class="lg:col-span-1 border-dodger-blue-400 border rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4">My Modules</h2>
            <ul class="space-y-2 overflow-y-auto" style="max-height: 300px;">
                @foreach ($listCourse as $course)
                    <li class="flex items-center space-x-4 p-2 hover:bg-gray-200 rounded-lg">
                        <a href="{{ route('mycontents', ['module_id' => $course->id]) }}"
                            class="flex items-center space-x-4 prevent-jump">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="Course Image" class="w-12 h-12 rounded-lg object-cover">
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
                <h2 class="mt-4 font-semibold text-xl">{{ $mainContent->name }}</h2>
                <p class="text-gray-600">{{ $mainContent->desc }}</p>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-8">
            <div class="border-dodger-blue-400 border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Videos</h2>
                <ul class="space-y-1">
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
                                <span class="text-sm">{{ $content->name }}</span>
                                <span id="video-duration-{{ $content->id }}" class="ml-2 text-gray-500"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="border-dodger-blue-400 border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-4">Related Modules</h2>
                <ul class="space-y-2">
                    @foreach ($relatedModule as $relatedCourse)
                        <li class="flex items-center space-x-4">
                            <form id="redirectForm-{{ $relatedCourse->id }}"
                                action="{{ route('contents', ['slug' => $relatedCourse->slug]) }}" method="POST">
                                @csrf
                                <span class="text-sm text-black hover:underline cursor-pointer"
                                    onclick="document.getElementById('redirectForm-{{ $relatedCourse->id }}').submit();">
                                    {{ $relatedCourse->name }}
                                </span>
                            </form>
                            <p class="text-xs text-gray-500">{{ $relatedCourse->contents_count }} Videos</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('main-video').addEventListener('ended', function() {
            fetch('{{ route('contents.markWatched', ['id' => $mainContent->id]) }}', {
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
