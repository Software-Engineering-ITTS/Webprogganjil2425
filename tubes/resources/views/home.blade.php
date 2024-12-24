<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
  <a href="{{url('login')}}">Login</a>
  <a href="{{url('logout')}}" class="text-white font-bold hover:text-teal-700 px-9 py-3">Logout</a>
</body>
</html>