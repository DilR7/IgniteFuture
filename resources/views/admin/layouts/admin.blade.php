<!-- resources/views/layouts/admin.blade.php -->
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

    <div class="w-64">
        @include('admin.layouts.sidebar')
    </div>
    <div class=" flex flex-col">
        <header class="p-4 w-auto flex-grow">
            @include('admin.layouts.header')
        </header>

        <main id="content" class="flex-grow p-4 mt-8 ml-10 overflow-auto">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>

</html>
