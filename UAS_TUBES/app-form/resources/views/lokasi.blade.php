<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-800">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="w-full max-w-md mx-auto bg-gray-500 shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Form Lokasi Aset Perusahaan</h2>
        <form method="POST" action="/lokasi/store">
            @csrf
            <div class="mb-4">
                <label for="nama_lokasi" class="block text-sm font-medium text-white">Nama Lokasi</label>
                <input
                    type="text"
                    name="nama_lokasi"
                    id="nama_lokasi"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div class="mb-4">
                <label for="kode_lokasi" class="block text-sm font-medium text-white">Kode Lokasi</label>
                <input
                    type="text"
                    name="kode_lokasi"
                    id="kode_lokasi"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div class="mb-4">
                <label for="aset_id" class="block text-sm font-medium text-white">Nama Aset</label>
                <select
                    name="aset_id"
                    id="aset_id"
                    required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Pilih Nama Aset</option>
                    @foreach ($data as $aset)
                    <option value="{{ $aset->id }}">{{ $aset->nama_aset }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jenis_lokasi" class="block text-sm font-medium text-white">Jenis Lokasi</label>
                <select
                    name="jenis_lokasi"
                    id="jenis_lokasi"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="Kantor">Kantor</option>
                    <option value="Gudang">Gudang</option>
                    <option value="Site Project">Site Project</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="catatan" class="block text-sm font-medium text-white">Catatan (Opsional)</label>
                <textarea
                    name="catatan"
                    id="catatan"
                    rows="3"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="text-center">
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                    Simpan Lokasi
                </button>
            </div>
        </form>
    </div>

</body>

</html>