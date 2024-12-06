<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-semibold text-gray-900">
                    Toko Buku
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ url('/bukus') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                    Daftar Buku
                </a>
                <a href="{{ url('/kategoris') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                    Kategori
                </a>
                <a href="{{ url('/transaksis') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                    Transaksi
                </a>
                <a href="{{ url('/detailTransaksis') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                    Detail Transaksi    
                </a>
                

            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                Home
            </a>
            <a href="{{ url('/bukus') }}" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                Daftar Buku
            </a>
            <a href="{{ url('/kategoris') }}" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                Kategori
            </a>
            <a href="{{ url('/transaksis') }}" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">
                Tranasaksi
            </a>

        </div>
    </div>
</nav>

<script>
    // Toggle Mobile Menu
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>