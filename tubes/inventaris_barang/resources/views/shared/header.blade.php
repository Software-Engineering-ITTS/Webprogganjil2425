<header class="dark:bg-pink-300 text-gray-900 shadow">
  <div class="container mx-auto px-4 py-3 flex justify-between">
    <a href="#" <h1 class="text-lg text-gray-900 font-semibold hover:text-white">Inventaris Barang Toko Bu Sudjarmiati</h1></a>
    <nav class="flex space-x-6 items-center">
      <a href="#" class="hover:text-white">Stock barang</a>
      <a href="#" class="hover:text-white">Pembelian</a>
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