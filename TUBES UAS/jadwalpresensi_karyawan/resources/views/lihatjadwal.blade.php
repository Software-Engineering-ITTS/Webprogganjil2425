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
                        <a class="hover:text-gray-500" href="{{ url('/karyawan') }}">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/karyawan/lihatjadwal') }}">Lihat Jadwal</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/karyawan/riwayatpindah') }}">Riwayat Pengajuan</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="{{ url('/karyawan/riwayatpresensi') }}">Riwayat Presensi</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]"><a href="/">Logout</a></button>
            </div>
        </nav>
    </header>

    <!-- MAIN -->
    <div class="flex justify-center items-center mb-10 screen">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Lihat Jadwal Karyawan</h1>
            <div class="overflow-x-auto">
                <div>
                    <form action="{{ url('/karyawan/carijadwal') }}" method="GET" class="mb-5">
                        <div class="grid grid-cols-3 gap-4">
                            <!-- Filter Shift -->
                            <div class="mb-3">
                                <label for="filtershift" class="block font-medium">Pilih Shift</label>
                                <select name="filtershift" id="filtershift" class="border rounded-md w-full text-base px-2 py-1">
                                    <option value="" selected>Semua Shift</option>
                                    <option value="Pagi (07:00 - 15:00)">Pagi (07:00 - 15:00)</option>
                                    <option value="Malam (15:00 - 23:00)">Malam (15:00 - 23:00)</option>
                                </select>
                            </div>
                            <!-- Filter Tanggal Mulai -->
                            <div class="mb-3">
                                <label for="start_date" class="block font-medium">Tanggal Mulai</label>
                                <input type="date" name="start_date" id="start_date" class="border rounded-md w-full text-base px-2 py-1">
                            </div>
                            <!-- Filter Tanggal Akhir -->
                            <div class="mb-3">
                                <label for="end_date" class="block font-medium">Tanggal Akhir</label>
                                <input type="date" name="end_date" id="end_date" class="border rounded-md w-full text-base px-2 py-1">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="ml-3 px-5 py-2 bg-[#a6c1ee] text-white rounded-md hover:bg-[#87acec]">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Shift</th>
                            <th class="px-4 py-2 border">Ajukan Pindah Shift</th>
                            <th class="px-4 py-2 border">Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal_kerja as $jadwal)
                        @php
                        $today = \Carbon\Carbon::now('Asia/Jakarta');
                        $jadwalTanggal = \Carbon\Carbon::parse($jadwal->tanggal)->timezone('Asia/Jakarta');
                        @endphp
                        <tr>
                            <td class="px-4 py-2 border">{{ $jadwal->tanggal }}</td>
                            <td class="px-4 py-2 border">{{ $jadwal->shift }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2">
                                    @if ($jadwal->can_change_shift)
                                    <a href="/karyawan/pindahshift/{{ $jadwal->id }}"
                                        class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">
                                        Ajukan Pindah Shift
                                    </a>
                                    @else
                                    <button class="px-3 py-1 bg-red-500 text-white rounded" disabled>
                                        Tidak Bisa Pindah Shift
                                    </button>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2">
                                    @if ($jadwalTanggal->isSameDay($today))
                                    <a href="/karyawan/presensi/{{ $jadwal->id }}"
                                        class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">
                                        Presensi
                                    </a>
                                    @else
                                    <button class="px-3 py-1 bg-red-500 text-white rounded" disabled>
                                        Tidak Bisa Presensi
                                    </button>
                                    @endif
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