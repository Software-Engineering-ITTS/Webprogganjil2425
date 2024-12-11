<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <h1 class="text-2xl font-bold">Toko Buku</h1>
            <!-- Search Bar -->
            <div class="relative w-full max-w-md mx-4 hidden sm:block">
                <input type="text" placeholder="Cari buku, penulis, atau kategori..."
                    class="w-full px-4 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                <button
                    class="absolute top-0 right-0 bg-yellow-400 text-gray-800 px-4 py-2 rounded-lg hover:bg-yellow-500">
                    Cari
                </button>
            </div>
            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="#" class="hover:text-yellow-400">Beranda</a>
                <a href="#" class="hover:text-yellow-400">Kategori</a>
                <a href="#" class="hover:text-yellow-400">Favorit</a>
                <a href="/login" class="hover:text-yellow-400">Akun</a>
            </nav>
            <!-- Cart Icon -->
            <div class="flex items-center space-x-4">
                <button class="text-xl">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-blue-100 py-20 text-center">
        <div class="container mx-auto">
            <h2 class="text-4xl md:text-6xl font-bold text-blue-600 mb-4">Baca Buku, Perkaya Hidup</h2>
            <p class="text-lg md:text-xl text-gray-700 mb-6">Diskon hingga 50% untuk pembelian online!</p>
            <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">Belanja Sekarang</a>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-100 to-transparent pointer-events-none"></div>
    </section>

    <!-- Categories -->
    <section class="py-12">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Kategori Buku</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Kategori 1" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg text-gray-800 text-center">Fiksi</h4>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Kategori 2" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg text-gray-800 text-center">Non-Fiksi</h4>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Kategori 3" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg text-gray-800 text-center">Biografi</h4>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Kategori 4" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg text-gray-800 text-center">Teknologi</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Book List -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto">
            <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Buku Pilihan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Book Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/200" alt="Book Cover" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg text-gray-800">Judul Buku</h4>
                        <p class="text-gray-600">Penulis: John Doe</p>
                        <p class="text-blue-600 font-bold mt-2">Rp 50.000</p>
                        <button class="mt-4 bg-blue-600 text-white w-full py-2 rounded-lg hover:bg-blue-700">Tambah ke
                            Keranjang</button>
                    </div>
                </div>
                <!-- Tambahkan lebih banyak buku di sini -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-8">
        <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Section 1 -->
            <div>
                <h4 class="font-bold text-lg mb-4">Toko Buku</h4>
                <p>Belanja buku online dengan nyaman dan terpercaya.</p>
            </div>
            <!-- Section 2 -->
            <div>
                <h4 class="font-bold text-lg mb-4">Navigasi</h4>
                <ul>
                    <li><a href="#" class="hover:text-yellow-400">Beranda</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Kategori</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Tentang Kami</a></li>
                </ul>
            </div>
            <!-- Section 3 -->
            <div>
                <h4 class="font-bold text-lg mb-4">Bantuan</h4>
                <ul>
                    <li><a href="#" class="hover:text-yellow-400">FAQ</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Kontak</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <!-- Section 4 -->
            <div>
                <h4 class="font-bold text-lg mb-4">Media Sosial</h4>
                <ul>
                    <li><a href="#" class="hover:text-yellow-400">Facebook</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Instagram</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-8">
            &copy; 2024 Toko Buku. Semua Hak Dilindungi.
        </div>
    </footer>

</body>

</html>
