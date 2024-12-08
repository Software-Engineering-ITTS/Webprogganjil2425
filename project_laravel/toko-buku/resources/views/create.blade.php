<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div id="tambah-buku-form"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-screen items-center justify-center">
        <div class="rounded-lg border">
            <div class="border-b p-5 flex justify-between items-center bg-white">
                <h2 class="font-medium text-2xl">Tambah Buku</h2>
                <button type="button" id="tambah-buku-form"
                    class="bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm"
                    data-modal-toggle="tambah-buku-form">
                    <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="p-5 bg-white w-96">
                <form action="{{route('store')}}"
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium">Judul</label>
                        <input type="text" name="judul" id="judul" class="border text-sm rounded-lg w-full"
                            placeholder="Judul Buku" required>
                    </div>
                    <div class="mb-4">
                        <label for="penulis" class="block mb-2 text-sm font-medium">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="border text-sm rounded-lg w-full"
                            placeholder="Nama" required>
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block mb-2 text-sm font-medium">Harga</label>
                        <div class="relative">
                            <h3
                                class="absolute inset-y-0 start-0 top-0 flex items-center p-2 border-r border-gray-700 ">
                                IDR</h3>
                            <input type="number" name="harga" id="harga"
                                class="border text-sm rounded-lg w-full ps-12" placeholder="10000" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="4" class="border text-sm rounded-lg w-full"
                            placeholder="Sinopsi atau Deskripsi sebuah buku"></textarea>
                    </div>
                    <button type="submit" class="p-2 font-medium text-base border rounded-lg bg-teal-300 items-center">
                        Tambah Buku
                    </button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
