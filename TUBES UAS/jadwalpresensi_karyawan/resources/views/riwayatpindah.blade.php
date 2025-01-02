<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
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
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Riwayat Pengajuan Pindah Shift</h1>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Tanggal Pengajuan</th>
                            <th class="px-4 py-2 border">Tanggal Awal</th>
                            <th class="px-4 py-2 border">Shift Awal</th>
                            <th class="px-4 py-2 border">Tanggal Pindah</th>
                            <th class="px-4 py-2 border">Shift Pindah</th>
                            <th class="px-4 py-2 border">Alasan</th>
                            <th class="px-4 py-2 border">Status Pengajuan</th>
                            <th class="px-4 py-2 border">Tanggal Diproses</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pindah_shift as $shift)
                        <tr>
                            <td class="px-4 py-2 border">{{ $shift->tanggal_pengajuan }}</td>
                            <td class="px-4 py-2 border">{{ $shift->tanggal_awal }}</td>
                            <td class="px-4 py-2 border">{{ $shift->shift_awal }}</td>
                            <td class="px-4 py-2 border">{{ $shift->tanggal_pindah }}</td>
                            <td class="px-4 py-2 border">{{ $shift->shift_pindah }}</td>
                            <td class="px-4 py-2 border">{{ $shift->alasan }}</td>
                            <td class="px-4 py-2 border">
                                @if ($shift->status_pengajuan === 'Pending')
                                <button class="px-3 py-1 bg-yellow-400 text-white rounded-md">
                                    {{ $shift->status_pengajuan }}
                                </button>
                                @elseif ($shift->status_pengajuan === 'Ditolak')
                                <button class="px-3 py-1 bg-red-400 text-white rounded-md">
                                    {{ $shift->status_pengajuan }}
                                </button>
                                @elseif ($shift->status_pengajuan === 'Disetujui')
                                <button class="px-3 py-1 bg-blue-400 text-white rounded-md">
                                    {{ $shift->status_pengajuan }}
                                </button>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">{{ $shift->tanggal_proses }}</td>
                            <td class="px-4 py-2 border">
                                <form action="/karyawan/pindahshift/{{ $shift->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-red-400 text-white rounded hover:bg-red-500" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
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