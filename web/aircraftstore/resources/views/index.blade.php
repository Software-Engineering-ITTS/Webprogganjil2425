<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-black text-white ">
    <header>
        {{--  --}}
    </header>
    <main>
        <div class="mt-64">
            <h1 class="text-8xl text-center"> Aircraft Store</h1>
            <h3 class="text-3xl text-center"> Best Place to Buy Your Aircraft</h3>
        </div>
    </main>
    {{--  breeze default --}}
    <nav class="flex justify-center mt-7">
        {{-- if has been login directly to dashboard --}}
        @auth
            <a href="{{ url('/dashboard') }}" class="bg-gray-700 p-2 rounded-lg mx-3 hover:bg-gray-500">
                Dashboard
            </a>
            {{-- if not, it should be login or register first --}}
        @else
            <a href="{{ route('login') }}" class="bg-gray-700 p-2 rounded-lg mx-3 hover:bg-gray-500 font-semibold">
                Login
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-gray-700 p-2 rounded-lg mx-3 hover:bg-gray-500 font-semibold">
                    Register
                </a>
            @endif
        @endauth
    </nav>
    <footer>
        {{--  --}}
    </footer>
</body>

</html>
