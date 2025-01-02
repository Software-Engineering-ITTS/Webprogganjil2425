<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Peminjaman Buku')</title>
    @vite('resources/css/app.css') <!-- Jika menggunakan Vite -->
    {{--
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- Hapus ini jika hanya menggunakan Vite --> --}}
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-red-600 text-white p-4">
            <h1 class="text-2xl">TELU-BOOK</h1>
        </header>

        <!-- Main Content -->
        <main class="flex-grow p-4">
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-3 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-red-600 text-white p-4 text-center">
            © TEL U 
        </footer>
    </div>
</body>

</html>