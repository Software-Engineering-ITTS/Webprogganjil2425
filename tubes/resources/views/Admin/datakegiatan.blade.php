@include('layouts.sidebar')

<main class="ml-64 p-6">
    <h1 class="font-bold text-lg">List Data Kegiatan</h1>
    <div class="my-8">
        <button type="button" data-modal-target="tambah-kegiatan" data-modal-toggle="tambah-kegiatan"
            class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
            Kegiatan</button>
    </div>

    @include('admin.tambahkegiatan')

    <table class="mt-5 table-auto w-full text-base">
        <thead class="border border-black">
            <tr class="uppercase">
                <th class="p-3 border-r-2 border-black">Nama Kegiatan</th>
                <th class="p-3 border-r-2 border-black">Tanggal Kegiatan</th>
                <th class="p-3 border-r-2 border-black">Lokasi</th>
                <th class="p-3 border-r-2 border-black">Deskripsi</th>
                <th class="p-3">Created</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border border-black text-center">
                <td class="p-3 border-r-2 border-black"></td>
                <td class="p-3 border-r-2 border-black"></td>
                <td class="p-3 border-r-2 border-black"></td>
                <td class="p-3 border-r-2 border-black"></td>
                <td class="p-3 border-r-2 border-black"></td>
            </tr>
        </tbody>
    </table>
</main>
