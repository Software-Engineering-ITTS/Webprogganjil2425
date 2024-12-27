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
                    <h2 class="text-lg font-bold text-gray-700 mb-4">Tambah Aset Perusahaan</h2>

                    <div class="flex justify-between mb-4">
                        <a href="/asettambah" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Tambah Data Aset Perusahaan</a>
                    </div>

                    <form method="POST" action="/aset">
                        @csrf
                        <div class="mb-4">
                            <label for="kode_barang" class="block text-sm font-medium text-white">Kode Barang</label>
                            <input
                                type="text"
                                name="kode_barang"
                                id="kode_barang"
                                required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="nama_aset" class="block text-sm font-medium text-white">Nama Aset</label>
                            <input
                                type="text"
                                name="nama_aset"
                                id="nama_aset"
                                required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="spesifikasi" class="block text-sm font-medium text-white">Spesifikasi Aset</label>
                            <textarea
                                name="spesifikasi"
                                id="spesifikasi"
                                rows="3"
                                required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="gambar_aset" class="block text-sm font-medium text-white">Gambar Aset</label>
                            <input
                                type="file"
                                name="gambar_aset"
                                id="gambar_aset"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </input>
                        </div>
                        <div class="mb-4">
                            <label for="kategori_aset" class="block text-sm font-medium text-white">Kategori aset</label>
                            <input
                                type="text"
                                name="kategori_aset"
                                id="kategori_aset"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </input>
                        </div>
                        <div class="mb-4">
                            <label for="departement" class="block text-sm font-medium text-white">Departement</label>
                            <input
                                type="text"
                                name="departement"
                                id="departement"
                                required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div class="text-center">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                                Simpan Aset
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>