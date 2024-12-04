<header class="bg-gray-800 text-white shadow">
  <div class="container mx-auto px-4 py-3 flex justify-between items-center">
    <a href="{{route('home.index')}}" <h1 class="text-lg font-semibold">Toko Buku</h1></a>
    <nav class="flex space-x-6">
      <a href="{{route('books.index')}}" class="hover:text-gray-400">Buku</a>
      <a href="{{route('users.index')}}" class="hover:text-gray-400">Pelanggan</a>
      <a href="{{route('transactions.index')}}" class="hover:text-gray-400">Transaksi</a>
    </nav>
  </div>
</header>