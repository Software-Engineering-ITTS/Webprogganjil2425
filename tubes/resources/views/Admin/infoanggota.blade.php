@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Kegiatan yang {{ $users->username }} ikuti :</h1>

        @if ($users->kegiatans->isEmpty())
            <div class="flex justify-center items-center h-[75vh]">
                <p class="mt-4 font-medium text-xl">Belum mengikuti kegiatan apa pun.</p>
            </div>
        @else
            <table class="table-auto w-full mt-4">
                <thead>
                    <tr class="border-b-2">
                        <th class="px-4 py-2">Nama Kegiatan</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Lokasi</th>
                        <th class="px-4 py-2">Waktu</th>
                        <th class="px-4 py-2">Iuran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->kegiatans as $kegiatan)
                        <tr class="border-b text-center odd:bg-white even:bg-gray-100">
                            <td class="px-4 py-2">{{ $kegiatan->nama_kegiatan }}</td>
                            <td class="px-4 py-2">{{ $kegiatan->tanggal_kegiatan }}</td>
                            <td class="px-4 py-2">{{ $kegiatan->lokasi_kegiatan }}</td>
                            <td class="px-4 py-2">{{ $kegiatan->waktu_kegiatan }}</td>
                            <td class="px-4 py-2">{{ $kegiatan->pivot->iuran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>
