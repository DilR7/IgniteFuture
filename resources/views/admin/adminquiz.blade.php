@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex justify-end">
        <a href="#" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">+ Add Quiz</a>
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
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quiz as $q)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $q->module->name }}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $q->title }}
                    </th>
                    <td>
                        <div class="flex space-x-2 mx-auto w-fit ml-auto">
                            <a href="" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">EDIT</a>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"> DELETE </button>
                        </form>
                        </div>
                    </td>   

                </tr>
            @endforeach
        </tbody>
    </table>
</div>                  
@endsection