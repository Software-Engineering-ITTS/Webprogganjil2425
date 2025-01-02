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
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Riwayat Presensi Karyawan</h1>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Status Hadir</th>
                            <th class="px-4 py-2 border">Jam Masuk</th>
                            <th class="px-4 py-2 border">Jam Keluar</th>
                            <th class="px-4 py-2 border">Status Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi as $pres)
                        <tr>
                            <td class="px-4 py-2 border">{{ $pres->tanggal }}</td>
                            <td class="px-4 py-2 border">{{ $pres->status_hadir }}</td>
                            <td class="px-4 py-2 border">{{ $pres->jam_masuk }}</td>
                            <!-- <td class="px-4 py-2 border">{{ $pres->jam_keluar }}</td> -->
                            <td class="px-4 py-2 border">
                                @if ($pres->jam_keluar === null)
                                <button
                                    onclick="confirmJamKeluar('{{ url('/karyawan/konfirmkeluar/'.$pres->id) }}')"
                                    class="px-3 py-1 bg-blue-400 text-white rounded-md hover:bg-blue-500">
                                    Konfirmasi Jam Keluar
                                </button>
                                @else
                                {{ $pres->jam_keluar }}
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                @if ($pres->status_waktu === 'Terlambat')
                                <button class="px-3 py-1 bg-red-400 text-white rounded-md">
                                    {{ $pres->status_waktu }}
                                </button>
                                @elseif ($pres->status_waktu === 'Tepat Waktu')
                                <button class="px-3 py-1 bg-blue-400 text-white rounded-md">
                                    {{ $pres->status_waktu }}
                                </button>
                                @elseif ($pres->status_waktu === 'Tidak Ada')
                                <button class="px-3 py-1 bg-yellow-400 text-white rounded-md">
                                    {{ $pres->status_waktu }}
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmJamKeluar(url) {
            if (confirm('Apakah Anda yakin ingin mengonfirmasi jam keluar?')) {
                window.location.href = url; // Lakukan redirect untuk konfirmasi jam keluar
            }
        }
    </script>
</body>

</html>