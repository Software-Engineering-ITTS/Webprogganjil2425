<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @stack('css')
</head>

<body>
    <div class="container mt-4">
        @yield('isi')
    </div>

    @stack('js')

</body>

</html>
