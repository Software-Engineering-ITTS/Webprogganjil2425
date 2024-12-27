@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div>
        <div class="mb-2 border-b-2 w-fit border-black">
            <h1 class="font-semibold text-3xl">Detail Kegiatan</h1>
        </div>
        <h2 class="font-medium text-xl">Nama Kegiatan : {{ $kegiatans->nama_kegiatan }}</h2>
        <h2 class="font-medium text-xl">Jadwal Kegiatan : {{ $kegiatans->tanggal_kegiatan }}</h2>
        <h2 class="font-medium text-xl">Lokasi Kegiatan : {{ $kegiatans->lokasi_kegiatan }}</h2>
        <h2 class="font-medium text-xl">Waktu Kegiatan : {{ $kegiatans->waktu_kegiatan }}</h2>

        <div class="mt-8">
            <h2 class="font-medium text-xl">Peserta Kegiatan :</h2>
        </div>
        <div class="mt-4 flex justify-center items-center">
            <div class="w-2/4">
                <table class="table-auto w-full">
                    <thead class="uppercase border-b-2">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Iuran</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($kegiatans->users as $index => $users )
                            <tr class="text-center border-b odd:bg-white even:bg-gray-100">
                                <td>{{$index + 1}}</td>
                                <td>{{$users->username}}</td>
                                <td>{{$users->pivot->iuran}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
