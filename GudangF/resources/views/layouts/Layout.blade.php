<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <title>GUDANG!</title>
</head>
<body>
    <div class=title >
        <h1>GUDANG UMAT</h1>
    </div>
    <div class="container mx-auto mt-10">
        @yield('content') 
    </div>
</body>
</html>