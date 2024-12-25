@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end">
            <a href="{{ route('adminquiz.add') }}"
                class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">+
                Add Quiz</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Module
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quiz Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz as $q)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $q->module->name }}
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $q->title }}
                        </td>
                        <td class="px-6 py-2">
                            <img class="w-20 h-20 object-cover" src="data:image/png;base64, {{ $q->img }}"
                                alt="investment-seed-round" />
                        </td>
                        <td>
                            <div>
                                <a href="{{ route('adminquiz.edit', $q->id) }}"
                                    class="text-white bg-blue-700 border border-gray-300 focus:outline-none hover:bg-blue-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    Edit
                                </a>

                                <form action="{{ route('adminquiz.delete', $q->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-700 border border-gray-300 focus:outline-none hover:bg-red-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
