<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="tambah-kegiatan"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-screen items-center justify-center">
        <div class="rounded-lg border">
            <div class="border-b p-5 flex justify-between items-center bg-white">
                <h2 class="font-medium text-2xl">Tambah Kegiatan</h2>
                <button type="button" id="tambah-kegiatan"
                    class="bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm"
                    data-modal-toggle="tambah-kegiatan">
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
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_kegiatan" class="block mb-2 text-sm font-medium">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                            class="border text-sm rounded-lg w-full"
                            placeholder="Kegiatan Bersih - Bersih bersama Pandawara" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_kegiatan" class="block mb-2 text-sm font-medium">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan"
                            class="border text-sm rounded-lg w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="lokasi_kegiatan" class="block mb-2 text-sm font-medium">Lokasi Kegiatan</label>
                        <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan"
                            class="border text-sm rounded-lg w-full" placeholder="Pantai Anyer" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_kegiatan" class="block mb-2 text-sm font-medium">Waktu Kegiatan</label>
                        <input type="time" name="waktu_kegiatan" id="waktu_kegiatan"
                            class="border text-sm rounded-lg w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium">Deskripsi atau Notes</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="4" class="border text-sm rounded-lg w-full"
                            placeholder="Melakukan pembersihan pantai anyer"></textarea>
                    </div>
                    <button type="submit"
                        class="p-2 font-medium text-base border rounded-lg bg-teal-300 items-center hover:text-white">
                        Tambahkan
                    </button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
