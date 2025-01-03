@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-2/5 space-y-2 border shadow-lg rounded-lg bg-white">
            <h1 class="m-5 font-bold text-3xl uppercase">Edit Kegiatan</h1>
            <div class="pb-10">
                <form action="/dashboard/data-kegiatan/update-{{$kegiatans->id}}" method="POST" class="space-y-3">
                    @method('PUT')
                    @csrf
                    <div class="m-10">
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="block font-medium">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                value="{{$kegiatans->nama_kegiatan}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_kegiatan" class="block font-medium">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan"
                                class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                value="{{$kegiatans->tanggal_kegiatan}}"  required>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi_kegiatan" class="block font-medium">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan"
                                class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                value="{{$kegiatans->lokasi_kegiatan}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="waktu_kegiatan" class="block font-medium">Waktu Kegiatan</label>
                            <input type="time" name="waktu_kegiatan" id="waktu_kegiatan"
                                class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                value="{{$kegiatans->waktu_kegiatan}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="block font-medium">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi"
                                class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                value="{{$kegiatans->deskripsi}}" required>
                        </div>
                    </div>

                    <div class="p-4 text-center">
                        <div class="m-3 py-2">
                            <button type="submit"
                                class="font-medium bg-blue-700 text-white w-2/5 rounded-lg p-2 text-center">Confirm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
