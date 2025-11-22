<!doctype html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-200">
    <x-navbar />
    <main class="flex-1 overflow-y-auto">
    @yield('content')
</main>
    <x-footer />
</body>
</html>
