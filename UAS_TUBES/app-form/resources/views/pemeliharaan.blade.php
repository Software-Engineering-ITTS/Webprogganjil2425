<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aset Perusahaan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-600 min-h-screen">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">PT. SUGENG SIDOMUNDUR</h1>
            <div>
                <span>Welcome, <strong>admin</strong></span>
                <a href="/login" class="bg-red-500 text-white px-2 py-1 rounded-lg text-sm hover:bg-red-600">Logout</a>
            </div>
        </div>
    </header>

    <div class="container mx-auto py-6">
        <div class="flex">
            <nav class="w-1/4 bg-gray-400 shadow-md rounded-lg p-4">
            <ul>
                    <li class="mb-2">
                        <a href="/welcome" class="text-gray-700 font-medium hover:text-blue-600">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="/app" class="text-gray-700 font-medium hover:text-blue-600">Data Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lihatlokasi" class="text-gray-700 font-medium hover:text-blue-600">Data Lokasi Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/pemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Pemeliharaan</a>
                    </li>
                    <li class="mb-2">
                        <a href="/viewpemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Data Pemeliharaan Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lokasi" class="text-gray-700 font-medium hover:text-blue-600">Lokasi</a>
                    </li>
                </ul>
            </nav>
            <main class="w-3/4 ml-4">
                <div class="bg-gray-400 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold text-gray-700 mb-4">Tambah Pemeliharaan Aset Perusahaan</h2>

                    <form method="POST" action="{{ route('pemeliharaan.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="aset_id" class="block text-sm font-medium text-gray-700">Aset</label>
                            <select name="aset_id" id="aset_id" required class="mt-1 block w-full">
                                <option value="" disabled selected>Pilih Aset</option>
                                @foreach ($aset as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_aset }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi_id" class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <select name="lokasi_id" id="lokasi_id" required class="mt-1 block w-full">
                                <option value="" disabled selected>Pilih Lokasi</option>
                                @if($lokasi)
                                @foreach ($lokasi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pemeliharaan" class="block text-sm font-medium text-gray-700">Tanggal Pemeliharaan</label>
                            <input type="date" name="tanggal_pemeliharaan" id="tanggal_pemeliharaan" required class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="jenis_pemeliharaan" class="block text-sm font-medium text-gray-700">Jenis Pemeliharaan</label>
                            <input type="text" name="jenis_pemeliharaan" id="jenis_pemeliharaan" required class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_masalah" class="block text-sm font-medium text-gray-700">Deskripsi Masalah</label>
                            <textarea name="deskripsi_masalah" id="deskripsi_masalah" rows="3" class="mt-1 block w-full"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="tindakan" class="block text-sm font-medium text-gray-700">Tindakan</label>
                            <textarea name="tindakan" id="tindakan" rows="3" class="mt-1 block w-full"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status Pemeliharaan</label>
                            <select name="status" id="status" required class="mt-1 block w-full">
                                <option value="Pending">Pending</option>
                                <option value="Sedang Dipelihara">Sedang Dipelihara</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan Pemeliharaan</button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>
</body>

</html>