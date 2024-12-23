<div id="sidebar" class="lg:w-64 w-72 bg-pink-900 text-white shadow-md transition-all ease-in-out duration-300 fixed inset-0 lg:relative transform -translate-x-full lg:h-auto z-50">
    <nav class="flex flex-col p-6 space-y-4">

        <!-- Sidebar Links -->
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('karyawan.index') }}" class="text-sm hover:text-pink-200 transition-colors">
            <i class="fas fa-users mr-3"></i> Karyawan
        </a>
        <a href="{{ route('barang.index') }}" class="text-sm hover:text-pink-200 transition-colors">
            <i class="fas fa-box mr-3"></i> Manajemen Stock Barang
        </a>
        <a href="{{ route('barang-category.index') }}" class="text-sm hover:text-pink-200 transition-colors">
            <i class="fas fa-cogs mr-3"></i> Kategori Barang
        </a>
        <a href="{{ route('transaksi-list') }}" class="text-sm hover:text-pink-200 transition-colors">
            <i class="fas fa-history mr-3"></i> History Penjualan
        </a>
        @endif
        <a href="#" class="text-sm hover:text-pink-200 transition-colors">
            <i class="fas fa-shopping-cart mr-3"></i> Penjualan
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="bg-pink-700 hover:bg-pink-800 text-white py-2 px-4 rounded-lg w-full ">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </button>
        </form>
    </nav>
</div>

<!-- Sidebar Toggle for Mobile -->
<div id="sidebarToggle" class="fixed top-1 left-4 z-50 bg-pink-900 text-white p-3 rounded-full">
    <i class="fas fa-bars"></i>
</div>

<script>
    // Handle the sidebar toggle visibility on mobile
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');

    });

    window.addEventListener('resize', checkScreenWidth);
    checkScreenWidth();
</script>