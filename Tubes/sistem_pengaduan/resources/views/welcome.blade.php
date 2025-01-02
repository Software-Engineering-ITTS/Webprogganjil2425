<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapor Pak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <header class="bg-white text-gray-800 py-4 border-b-2 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4">
            <a href="{{ url('/') }}" class="flex items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 mr-4" />
            </a>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}" 
                           class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:bg-teal-400 hover:text-white focus:outline-none focus-visible:ring-indigo-500">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:bg-teal-400 hover:text-white focus:outline-none focus-visible:ring-indigo-500">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:bg-teal-400 hover:text-white focus:outline-none focus-visible:ring-indigo-500">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <div class="py-6 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex justify-center items-center">
                            <img src="https://i.pinimg.com/originals/3f/3d/3a/3f3d3ae5efc0673fc33ef8dd145c049a.gif" alt="Dashboard Image" class="rounded-lg shadow-lg">
                        </div>
                        <div class="flex flex-col justify-center">
                            <h2 class="text-3xl font-bold mb-4">Layanan Informasi dan Dokumentasi Publik Indonesia</h2>
                            <p class="text-lg mb-4">
                                Sebagaimana amanat undang-undang 14 tahun 2008 tentang Keterbukaan Informasi Publik
                            </p>
                            <p class="text-sm text-gray-600">
                                Untuk informasi lebih lanjut, silakan hubungi kontak kami melalui formulir di bawah ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="text-2xl font-bold text-center mb-4">Kontak Kami</strong>
                    <form action="ajibayu@gmail.com " method="POST" enctype="text/plain">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-teal-300" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-teal-300" placeholder="Masukkan email Anda">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                            <textarea name="message" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-teal-300" rows="4" placeholder="Masukkan pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gray-800 text-white font-extrabold py-2 rounded-md">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>