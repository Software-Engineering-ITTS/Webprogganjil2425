<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Marchella</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <div id="app">
        @include('shared.header')
        <div class="flex h-screen overflow-hidden w-full">
            @include('shared.sidebar')
            <!-- Main Content Area -->
            <div id="mainContent" class="flex-1 overflow-y-auto transition-all duration-300 ease-in-out relative">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>