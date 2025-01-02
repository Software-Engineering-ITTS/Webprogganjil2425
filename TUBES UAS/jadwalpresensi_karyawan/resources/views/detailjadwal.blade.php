<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen">
    <div style="margin-left: 50px; margin-top: 40px;">
        <button class="bg-white text-black px-5 py-2 rounded-md hover:bg-[#0000] hover:text-white"><a href="/admin/jadwalkaryawan">Kembali</a></button>
    </div>
    <!-- MAIN -->
    <div class="flex justify-center items-center mb-10">
        <div class="w-5/6 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-10">Detail Jadwal Karyawan</h1>
            <div class="flex justify-between">
                <div>
                    <h5 class="font-bold mt-2 mb-2">Karyawan: {{ $karyawan->nama }}</h5>
                    <h5 class="font-bold mb-5">NIP: {{ $karyawan->nip }}</h5>
                </div>
                <div>
                    <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-md hover:bg-[#87acec] mb-5"><a href="/admin/tambahjadwal/{{ $karyawan->id }}">Tambah Jadwal</a></button>
                </div>
            </div>
            <div>
                <form action="{{ url('/admin/detailjadwal/'.$karyawan->id) }}" method="GET">
                    <div class="flex gap-2 mb-5">
                        <select name="filtershift" id="filtershift" class="border rounded-md w-full text-base px-2 py-1">
                            <option value="" {{ request('filtershift') == '' ? 'selected' : '' }}>Semua Shift</option>
                            <option value="Pagi (07:00 - 15:00)" {{ request('filtershift') == 'Pagi (07:00 - 15:00)' ? 'selected' : '' }}>Pagi (07:00 - 15:00)</option>
                            <option value="Malam (15:00 - 23:00)" {{ request('filtershift') == 'Malam (15:00 - 23:00)' ? 'selected' : '' }}>Malam (15:00 - 23:00)</option>
                        </select>
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="border rounded-md w-full text-base px-2 py-1">
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="border rounded-md w-full text-base px-2 py-1">

                        <button type="submit" class="ml-3 px-5 py-2 bg-[#a6c1ee] text-white rounded-md hover:bg-[#87acec]">Cari</button>
                    </div>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Shift</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal_kerja as $jadwal)
                        <tr>
                            <td class="px-4 py-2 border">{{ $jadwal->tanggal }}</td>
                            <td class="px-4 py-2 border">{{ $jadwal->shift }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex gap-2">
                                    <a href="/admin/editjadwal/{{ $jadwal->id }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">
                                        Edit
                                    </a>
                                    <form action="/admin/hapusjadwal/{{ $jadwal->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="px-3 py-1 bg-red-400 text-white rounded hover:bg-red-500" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
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