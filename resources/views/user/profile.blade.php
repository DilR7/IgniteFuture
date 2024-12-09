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

    <div class="bg-gray-100 w-full mx-auto px-4 sm:px-6 lg:px-12 py-6">
        <div class="bg-dodger-blue-200 rounded-lg p-6 flex flex-col md:flex-row items-center md:justify-between shadow-md">
            <div class="flex items-center space-x-4">
                <img src="data:image/jpeg;base64, {{ $user->profile_picture }}" alt="Profile Image"
                    class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-700">{{ $user->email }}</p>
                </div>
            </div>
            <button id="edit-profile-btn"
                class="mt-6 md:mt-0 bg-dodger-blue-600 text-white px-6 py-2 rounded-lg hover:bg-dodger-blue-800 shadow-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 16.382A4.5 4.5 0 119.75 10.5m11.499-1.625a3.75 3.75 0 11-3.75-3.75" />
                </svg>
                Edit Profile
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="md:col-span-2 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Enrolled Modules</h3>
                <div class="max-h-60 overflow-auto space-y-4 pr-2">
                    @foreach ($listEnrolled as $list)
                        <div
                            class="bg-gray-100 rounded-lg flex items-center p-4 shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                alt="Module Image" class="w-20 h-20 rounded-lg object-cover shadow-sm">
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">{{ $list->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $list->contents_count }} Videos</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-center">
                    <h3 class="text-lg font-semibold">Achievements</h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 my-8">
                    @foreach ($achievement as $ach)
                        <div class="flex flex-col items-center">
                            <img src="{{ secure_asset($ach->image) }}" alt="{{ $ach->name }}"
                                class="w-14 h-14 object-cover mb-2">
                            <p class="text-sm font-medium text-gray-800">{{ $ach->name }}</p>
                            <p class="text-xs text-gray-500">Count: {{ $ach->count }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div id="edit-profile-modal"
        class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 w-11/12 sm:w-3/4 md:w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4 text-center md:text-left">Update Information</h3>
            <form action="{{ route('profileupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 pb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:ring-dodger-blue-500 focus:border-dodger-blue-500">
                </div>
                <div class="mb-4">
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700 pb-1">Profile Picture <span
                            class="text-red-700 font-bold">(Optional)</span></label>
                    <input type="file" id="profile_picture" name="profile_picture"
                        class="mt-1 block w-full rounded-md border-gray-300 border focus:ring-dodger-blue-500 focus:border-dodger-blue-500">
                </div>
                <div class="flex justify-between gap-2">
                    <button type="button" id="close-modal-btn"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-400">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-dodger-blue-600 text-white px-4 py-2 rounded-lg hover:bg-dodger-blue-800 focus:outline-none focus:ring focus:ring-dodger-blue-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            document.getElementById('edit-profile-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal-btn').addEventListener('click', function() {
            document.getElementById('edit-profile-modal').classList.add('hidden');
        });
    </script>
@endsection
