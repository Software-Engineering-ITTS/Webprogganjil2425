<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @include('components.header');
    <div class="min-h-[77vh]">
        @yield('content')
    </div>
    @include('components.footer')
</body>
</html>
