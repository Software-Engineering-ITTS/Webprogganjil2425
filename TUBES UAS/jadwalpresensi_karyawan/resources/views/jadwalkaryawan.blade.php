<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen">
    <header class="bg-white">
        <!-- NAVBAR -->
        <nav class="flex justify-between items-center w-[92%] mx-auto">
            <div class="flex justify-between items-center">
                <img class="w-16" src="https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg" alt="logo">
                <h1 class="font-black">WORKSET</h1>
            </div>
            <div class="">
                <ul class="flex items-center gap-6">
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin') }}">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/daftarkaryawan') }}">Daftar Karyawan</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/jadwalkaryawan') }}">Jadwal Karyawan</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/reviewpengajuan') }}">Pengajuan</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/admin/reviewpresensi') }}">Presensi</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]"><a href="/">Logout</a></button>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Lihat Jadwal Karyawan</h1>
            <div class="overflow-x-auto">
                <div class="items-left">
                    <form method="GET" action="{{ url('/admin/jadwalkaryawan') }}" class="flex items-center mb-5">
                        <div class="flex gap-2">
                            <input type="text" name="search" placeholder="Nama / NIP..."
                                class="px-3 py-2 border rounded-md w-5/6 mr-2" value="{{ request('search') }}">
                            <button type="submit" class="ml-3 px-5 py-2 bg-[#a6c1ee] text-white rounded-md hover:bg-[#87acec]">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">NIP</th>
                            <th class="px-4 py-2 border">Jabatan</th>
                            <th class="px-4 py-2 border">Divisi</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawans as $karyawan)
                        <tr>
                            <td class="px-4 py-2 border">{{ $karyawan->nama }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->nip }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->jabatan }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->divisi }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2">
                                    <a href="/admin/detailjadwal/{{ $karyawan->id }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">
                                        Detail Jadwal Karyawan
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>