<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Form Mahasiswa</title>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col bg-gradient-to-t from-blue-500 to-white h-64 w-full">
    <div class="bg-blue-500">
        <h1 class="text-3xl font-bold mb-6 text-center sticky top-0">Form Perizinan Mahasiswa</h1>
    </div>
    <div class="container mx-auto py-28 px-1">
        
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2 bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4 text-center">Form Input Perizinan</h2>
                <form action="/perizinanmahasiswa" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" id="nim" name="nim"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" min="<?php echo date('Y-m-d'); ?>" id="tanggal" name="tanggal"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    <div>
                        <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                        <input type="text" id="tempat" name="tempat"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    <div>
                        <label for="kegiatan" class="block text-sm font-medium text-gray-700">Kegiatan</label>
                        <input type="text" id="kegiatan" name="kegiatan"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    </div>
                    
                    @if (session('error'))
                    <div class="alert text-red-700">
                        {{ session('error') }}
                    </div>
                    @endif
                    
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
                        <a href="/logout" class="text-blue-500 hover:underline">Logout</a>
                    </div>
                </form>
            </div>

            <div class="md:w-5/6 bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4 text-center">History List Status</h2>
                <table class="w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">NIM</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Tempat</th>
                            <th class="px-4 py-2">Kegiatan</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($listPerizinanUseronly as $a)
                        <tr class="text-center">
                            <td class="px-4 py-2">{{ $a->nama }}</td>
                            <td class="px-4 py-2">{{ $a->nim }}</td>
                            <td class="px-4 py-2">{{ $a->alamat }}</td>
                            <td class="px-4 py-2">{{ $a->tanggal }}</td>
                            <td class="px-4 py-2">{{ $a->tempat }}</td>
                            <td class="px-4 py-2">{{ $a->kegiatan }}</td>
                            <td class="px-4 py-2">
                                @if ( $a->status == 1 )
                                    <span class="text-yellow-500 font-bold">Pending</span>
                                @elseif ( $a->status == 2 )
                                    <span class="text-green-500 font-bold">Approved</span>
                                @elseif ( $a->status == 3 )
                                    <span class="text-red-500 font-bold">Reject</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                @if ($a->status == 2)
                                    <a target="_blank" href="/cetakperizinan/{{ $a->idPerizinan }}"
                                        class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">Cetak</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="bg-blue-900 text-white py-3 text-center sticky bottom-0">
        <p class="text-sm">&copy; 2024 Form Mahasiswa</p>
    </footer>
</body>
</html>    