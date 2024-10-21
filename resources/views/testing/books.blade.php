<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books for Module {{ $moduleID }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 10px; /* space between buttons */
        }

        button {
            cursor: pointer;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #888;
        }
    </style>
</head>
<body>

<h1>Books for Module {{ $moduleID }}</h1>

@if ($books->isEmpty())
    <div class="no-data">No books available for this module.</div>
@else
    <table>
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->bookID }}</td>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->book_desc }}</td>
                    <td class="actions">
                        <a href="{{ route('books.show', $book->bookID) }}">
                            <button>View</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</body>
</html>
