<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet">
</head>

<body class="flex h-screen">

    <div class="w-64 bg-gray-800 text-white flex-none">
        @include('admin.layouts.sidebar')
    </div>

    <div class="flex flex-col flex-grow w-full">
        <header class="w-full bg-gray-900 text-white">
            @include('admin.layouts.header')
        </header>

        <main id="content" class="px-2 mt-20 w-full">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>

</html>
