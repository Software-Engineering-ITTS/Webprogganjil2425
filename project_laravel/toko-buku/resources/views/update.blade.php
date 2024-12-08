@include('sidebar')

<main class="bg-gray-100 ml-64 p-6">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Buku</h1>
        <form method="POST" action="/toko/{{ $data->id }}">
            @method('put')
            @csrf
            <div class="mb-4">
                <label for="judul" class="text-gray-700">Judul</label>
                <input 
                    type="text" 
                    name="judul" 
                    id="judul" 
                    class="w-full border rounded-md" 
                    value="{{ $data->judul }}">
            </div>
            <div class="mb-4">
                <label for="penulis" class="text-gray-700">Penulis</label>
                <input 
                    type="text" 
                    name="penulis" 
                    id="penulis" 
                    class="w-full border rounded-md" 
                    value="{{ $data->penulis }}">
            </div>
            <div class="mb-4">
                <label for="harga" class="text-gray-700">Harga</label>
                <input 
                    type="text" 
                    name="harga" 
                    id="harga" 
                    class="w-full border rounded-md" 
                    value="{{ $data->harga }}">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="text-gray-700">Deskripsi</label>
                <input 
                    type="text" 
                    name="deskripsi" 
                    id="deskripsi" 
                    class="w-full border rounded-md" 
                    value="{{ $data->deskripsi }}">
            </div>
            <div class="flex justify-between items-center">
                <button 
                    type="submit" 
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700">
                    Submit
                </button>
                <a 
                    href="/" 
                    class="text-indigo-600 hover:underline text-sm font-medium">
                    Kembali
                </a>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</main>