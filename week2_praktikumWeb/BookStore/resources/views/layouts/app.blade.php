<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Toko Buku' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @if(Auth::check())
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold">Toko Buku</h1>
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md">Books</a>
                            <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md">Transactions</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md">Dashboard</a>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-700 mr-4">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>