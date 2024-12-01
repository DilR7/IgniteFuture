<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <nav class="p-4 bg-gray-200 dark:bg-gray-700 shadow-md rounded-lg mb-6">
        <ul class="flex space-x-8">
            <li>
                <a href="{{ url('/mains') }}"
                    class="text-gray-900 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 px-3 py-2 rounded-lg transition">Mains</a>
            </li>
            <li>
                <a href="{{ url('/module') }}"
                    class="text-gray-900 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 px-3 py-2 rounded-lg transition">Modules</a>
            </li>
            <li>
                <a href="{{ url('/quizzes') }}"
                    class="text-gray-900 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 px-3 py-2 rounded-lg transition">Quizzes</a>
            </li>
        </ul>
    </nav>
    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>

</html>
