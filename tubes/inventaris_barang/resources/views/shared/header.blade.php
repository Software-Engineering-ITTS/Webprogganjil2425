<header class="dark:bg-pink-300 text-gray-900 shadow">
  <div class="container mx-auto px-4 py-3 flex justify-between">
    <a href="{{route('home')}}" class="text-lg font-semibold hover:text-white">
      Inventaris Barang Toko Bu Sudjarmiati
    </a>
    <nav class="flex space-x-6 items-center">
      @if(Auth::user()->role === 'admin')
      <a href="{{ route('karyawan.index') }}" class="hover:text-white">Karyawan</a>
      <a href="{{ route('barang.index')}}" class="hover:text-white">Manajemen Stock Barang</a>
      <a href="{{route('barang-category.index')}}" class="hover:text-white">Kategori barang</a>
      <a href="{{route('transaksi-list')}}" class="hover:text-white">History Penjualan</a>
      
      @endif
    
      <a href="#" class="hover:text-white">Penjualan</a>
      <form method="POST" action="{{ route('logout') }}" class="">
        @csrf
        <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700">
          Logout
        </button>
      </form>
    </nav>
  </div>
</header>
