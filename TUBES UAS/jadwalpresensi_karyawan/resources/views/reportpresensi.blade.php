<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
    <style>
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="font-bold mb-5 text-center">Laporan Presensi Karyawan</h1>
        <h4>Tanggal: {{ $tanggalPresensi }}</h4>
        <table class="w-full border-collapse border border-gray-300 text-sm mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NIP</th>
                    <th class="border px-4 py-2">Status Hadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presensi as $index => $pres)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $pres->karyawan->nama }}</td>
                    <td class="border px-4 py-2">{{ $pres->karyawan->nip }}</td>
                    <td class="border px-4 py-2">{{ $pres->status_hadir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            <h4 class="font-bold">Ringkasan:</h4>
            <ul>
                <li>Hadir: {{ $summary['hadir'] }}</li>
                <li>Sakit: {{ $summary['sakit'] }}</li>
                <li>Izin: {{ $summary['izin'] }}</li>
                <li>Alpha: {{ $summary['alpha'] }}</li>
            </ul>
        </div>
        <div class="mt-5 mb-5">
            <h4 class="font-bold">Daftar Karyawan Tidak Hadir (Alpha):</h4>
            <table class="w-full border-collapse border border-gray-300 text-sm mt-4">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Karyawan</th>
                        <th class="border px-4 py-2">Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alphaKaryawan as $index => $alpha)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $alpha->karyawan->nama }}</td>
                        <td class="border px-4 py-2">{{ $alpha->tanggal }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="window.print()"
            class="mt-4 px-5 py-2 bg-blue-400 text-white rounded hover:bg-blue-500">
            Cetak Laporan
        </button>
        <button onclick="window.location.href='/admin/reviewpresensi'"
            class="mt-4 px-5 py-2 bg-blue-400 text-white rounded hover:bg-blue-500">
            Kembali
        </button>
    </div>
</body>

</html>