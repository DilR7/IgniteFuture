@extends('user.layouts.template')
@section('main-content')
    <!-- Navbar -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
            <div class="flex pr-4 items-center space-x-2">
                <img src="{{ asset('path_to_logo') }}" alt="Logo" class="h-8 w-8">
                <p class="font-bold text-xl">IgniteFuture</p>
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
                    class="text-blue-500 font-semibold rounded-lg px-4 py-2 bg-blue-200 hover:bg-blue-500">Create
                    Account</a>
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Sign
                    In</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-32 py-8 flex gap-3 bg-gray-100 h-f">
        <!-- Sidebar for Course List -->
        <div class="w-1/4 border-dodger-blue-400 border rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4">My Modules</h2>
            <ul class="space-y-2 overflow-y-auto" style="max-height: 300px;">
                @foreach ($listCourse as $course)
                    <li class="flex items-center space-x-4 p-2 hover:bg-gray-200 rounded-lg">
                        <a href="{{ route('mycontents', ['module_id' => $course->id]) }}"
                            class="flex items-center space-x-4 prevent-jump">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="Course Image" class="w-12 h-12 rounded-lg" style="object-fit: cover">
                            <div>
                                <h3 class="font-medium text-sm line-clamp-2">{{ $course->name }}</h3>
                                <p class="text-xs text-gray-500">{{ $course->contents_count }} Videos</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


        <!-- Video Section -->

        <div class="w-1/2 border-dodger-blue-400 border rounded-lg">
            <video class="w-full rounded-t-lg" controls>
                <source src="{{ asset($mainContent->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-2">
                <h2 class="mt-4 font-semibold text-xl">{{ $mainContent->name }}</h2>
                <p class="text-gray-600">{{ $mainContent->desc }}</p>
            </div>
        </div>


        <!-- Sidebar for Module and Related Courses -->
        <div class="w-1/4 space-y-8">
            <!-- Module Outline -->
            <div class="border-dodger-blue-400 border rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Video</h2>
                <ul class="space-y-1">
                    @foreach ($contents as $content)
                        <li class="flex items-center space-x-2 border-dodger-blue-400">
                            <a href="{{ route('othercontents', ['slug' => $content->slug]) }}" class="text-black"><span
                                    class="text-sm">{{ $content->name }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Related Courses -->
            <div class="border-dodger-blue-400 border rounded-lg  p-4">
                <h2 class="text-lg font-semibold mb-4">Related Modules</h2>
                <ul class="space-y-2">
                    @foreach ($relatedModule as $relatedCourse)
                        <li class="flex items-center space-x-4">
                            {{-- <img src="{{ asset($relatedCourse->thumbnail) }}" alt="Related Course Image"
                                class="w-10 h-10 rounded-lg"> --}}
                            <div>
                                <form id="redirectForm-{{ $relatedCourse->id }}"
                                    action="{{ route('contents', ['slug' => $relatedCourse->slug]) }}" method="POST">
                                    @csrf
                                    <span class="text-sm text-black hover:underline cursor-pointer"
                                        onclick="document.getElementById('redirectForm-{{ $relatedCourse->id }}').submit();">
                                        {{ $relatedCourse->name }}
                                    </span>
                                </form>
                                <p class="text-xs text-gray-500">{{ $relatedCourse->contents_count }} Videos</p>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
