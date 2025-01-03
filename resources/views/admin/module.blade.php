@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <a href="{{ route('addModuleForm') }}"
                class="right-button text-white bg-black border-b border-black  hover:bg-white hover:text-black hover:border-black hover:border focus:outline-none focus:ring-4 focus:ring-black-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">+
                Add Module</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Module Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Module Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $m)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            {{ implode(' ', array_slice(explode(' ', $m->name), 0, 8)) }} ...
                        </td>
                        <td class="px-6 py-4">
                            {{ implode(' ', array_slice(explode(' ', $m->desc), 0, 8)) }} ...
                        </td>
                        <td class="px-2 py-2">
                            <img class="w-20 h-20 object-cover" src="data:image/png;base64, {{ $m->img }}"
                                alt="investment-seed-round" />
                        </td>
                        <th class="px-3 py-2">
                            {{ $m->category->name }}
                        </th>
                        <td>
                            <div class="flex space-x-2 mx-auto w-fit ml-auto">
                                <a href="{{ route('editModuleForm', $m->id) }}"
                                    class="text-white bg-blue-700 border border-gray-300 focus:outline-none hover:bg-blue-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Edit</a>
                                <form action="{{ route('deleteModule', $m->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-red-700 border border-gray-300 focus:outline-none hover:bg-red-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        Delete </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
