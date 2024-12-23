<div id="sidebar" class="lg:w-64 bg-pink-900 text-white shadow-md ease-in-out duration-300 fixed inset-0 lg:relative transform -translate-x-full lg:h-auto z-50">
    <nav id="sidebarnav" class="flex flex-col p-6 space-y-4">
        @if(Auth::user()->role === 'admin')
        <a href="{{ route('karyawan.index') }}" class="text-sm hover:text-pink-200">
            <i class="fas fa-users mr-3"></i> Karyawan
        </a>
        <a href="{{ route('barang.index') }}" class="text-sm hover:text-pink-200">
            <i class="fas fa-box mr-3"></i> Manajemen Stock Barang
        </a>
        <a href="{{ route('barang-category.index') }}" class="text-sm hover:text-pink-200 ">
            <i class="fas fa-cogs mr-3"></i> Kategori Barang
        </a>
        <a href="{{ route('transaksi-list') }}" class="text-sm hover:text-pink-200 ">
            <i class="fas fa-history mr-3"></i> History Penjualan
        </a>
        @endif
        <a href="#" class="text-sm hover:text-pink-200">
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


<div id="sidebarToggle" class="fixed top-1 left-4 z-50 bg-pink-900 text-white p-3 rounded-full">
    <i class="fas fa-bars"></i>
</div>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarnav = document.getElementById('sidebarnav');
    const isSidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isSidebarCollapsed) {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.add('lg:w-0');
        sidebarnav.classList.add('hidden');
    } else if (window.innerWidth >= 1024) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.remove('lg:w-0');
        sidebarnav.classList.remove('hidden');
    }

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        const isCollapsed = sidebar.classList.contains('-translate-x-full');
        localStorage.setItem('sidebarCollapsed', isCollapsed);


        if (isCollapsed) {
            sidebar.classList.add('lg:w-0');
            sidebarnav.classList.add('hidden');
        } else {
            sidebar.classList.remove('lg:w-0');
            sidebarnav.classList.remove('hidden');
        }
    });



    window.addEventListener('resize', checkScreenWidth);
    checkScreenWidth();
</script>