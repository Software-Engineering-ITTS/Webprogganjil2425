<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Dashboard</title>
</head>

<body class="min-h-screen bg-black text-white">
    <nav class="flex justify-center bg-gray-900 p-4">
        <div class="">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <a href="/"
                    onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
            </form>
        </div>
        <div class="">
            <a href=""></a>
        </div>
    </nav>
    <header>
        {{-- Header Content --}}
        <div class="p-3 my-7">
            <h1 class="text-center text-3xl">Admin Dashboard</h1>
        </div>
    </header>
    <main>
        {{-- Main Content --}}
    </main>
    <footer>
        {{-- Footer Content --}}
    </footer>
</body>

</html>
