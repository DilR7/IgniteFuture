<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contents for Module {{ $moduleID }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;

        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #000000;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Contents for Module {{ $moduleID }}</h1>

<table>
    <thead>
        <tr>
            <th>Content ID</th>
            <th>Content Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contents as $content)
            <tr>
                <td>{{ $content->contentID }}</td>
                <td>{{ $content->content_name }}</td>
                <td>{{ $content->content_desc }}</td>
                <td>
                    <a href="{{ route('contents.show', $content->contentID) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
