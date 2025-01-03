<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Pemesanan Online')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-500">Sistem Pemesanan Online</h1>
            <div class="space-x-4">
                <a href="{{ route('admin.product.index') }}" class="text-gray-700 hover:text-blue-500">Daftar Produk</a>
                <a href="{{ route('customer.order.create') }}" class="text-gray-700 hover:text-blue-500">Form Pemesanan</a>
                <a href="{{ route('customer.track') }}" class="text-gray-700 hover:text-blue-500">Pelacakan Pesanan</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-12">
        <div class="container mx-auto px-4 py-4 text-center text-gray-600">
            &copy; 2024 Sistem Pemesanan Online. Dibuat oleh Y.
        </div>
    </footer>
</body>
</html>
