@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex justify-end">
        <button 
        type="button" 
        class="right-button text-black border-b border-black bg-white hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
        onclick="window.location.href='{{ route('admin.adminbookcreate') }}'">
        + Add Book 
        </button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Book Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Cover
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminbook as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $book->name }}
                    </th>
                       
                    <td class="px-6 py-4">
                        {{ implode(' ', array_slice(explode(' ', $book->desc), 0, 5)) }} ...
                    </td>
                    <td class="px-2 py-2">
                        <img class="w-20 h-20 object-cover"
                             src="https://images.unsplash.com/photo-1496436818536-e239445d3327?q=80&w=1200"
                             alt="investment-seed-round" />
                    </td>    
                    <td>
                        <a 
                            href="{{ route('adminbook.edit', $book->id) }}" 
                            class="text-white bg-blue-700 border border-gray-300 focus:outline-none hover:bg-blue-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Edit
                        </a>

                        <form id="delete-form-{{ $book->id }}" action="{{ route('adminbook.delete', $book->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button 
                            type="button" 
                            onclick="confirmDelete('{{ $book->id }}')"
                            class="text-white bg-red-700 border border-gray-300 focus:outline-none hover:bg-red-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Delete
                        </button>
                    </td>                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>                  
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(bookId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${bookId}`).submit();
            }
        });
    }
</script>
