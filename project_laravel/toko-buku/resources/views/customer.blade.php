@include('sidebar')

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Beli Buku</h1>
        @foreach ($data as $items)
        <div class="mb-8">
            <div class="text-gray-700">Judul Buku   = {{ $items->judul }}</div>
            <div class="text-gray-600">Nama Penulis = {{ $items->penulis }}</div>
            <div class="text-gray-800">Harga Buku   = {{ $items->harga }}</div>
        </div>
        <form method="POST" action="/transaksi" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="text-gray-700">Nama</label>
                <input 
                    type="text" 
                    name="nama" 
                    id="nama" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="telepon" class="text-gray-700">Nomor Telepon</label>
                <input 
                    type="number" 
                    name="telepon" 
                    id="telepon" 
                    class="w-full border rounded-md">
            </div>
            <div>
                <label for="alamat" class="text-gray-700">Alamat</label>
                <input 
                    type="text" 
                    name="alamat" 
                    id="alamat" 
                    class="w-full border rounded-md">
            </div>
            <input type="hidden" name="status" value="Berhasil">
            <input type="hidden" name="toko_id" value="{{ $items->id }}">
            <div class="flex justify-between items-center">
                <button 
                    type="submit" 
                    class="w-32 bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700">
                    Beli
                </button>
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>