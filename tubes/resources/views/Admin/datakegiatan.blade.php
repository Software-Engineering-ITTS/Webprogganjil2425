@include('layouts.sidebar')

<main class="ml-64 p-6">
    <h1 class="font-bold text-lg">List Data Kegiatan</h1>
    <div class="mt-4">
        <button type="button" data-modal-target="tambah-kegiatan" data-modal-toggle="tambah-kegiatan"
            class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
            Kegiatan</button>
    </div>

    @include('admin.tambahkegiatan')

</main>
