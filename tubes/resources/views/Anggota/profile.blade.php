<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        Ini profile
    </h1>
    <a href="{{ url('logout') }}" class="font-bold hover:text-teal-700 px-9 py-3">Logout</a>
    @include('sweetalert::alert')

</body>

</html>
