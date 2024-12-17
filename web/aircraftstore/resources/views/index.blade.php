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
            <h1 class="text-8xl text-center">Aircraft Store</h1>
            <h3 class="text-3xl text-center">Best Place to Buy Your Aircraft</h3>
        </div>
    </main>
    {{-- bawaan breeze --}}
    <nav class="flex justify-center">
        {{-- jika pengguna sudah login maka akan langsung ke dashboard  --}}
        @auth
            <a href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring">
                Dashboard
            </a>
            {{-- jika belum harus login atau register --}}
        @else
            <a href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
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
