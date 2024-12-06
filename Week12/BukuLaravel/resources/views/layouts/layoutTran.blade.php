<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'transaction')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4">
        <header class="py-4">
            <h1 class="text-3xl font-bold text-center">@yield('header', 'transaction')</h1>
        </header>
        <main>
    @include('components.navbar')
            @yield('content')
        </main>
    </div>
</body>
</html>