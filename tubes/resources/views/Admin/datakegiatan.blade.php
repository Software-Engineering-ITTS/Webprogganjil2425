@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="mb-12 mt-5">
        <h1 class="font-bold text-center text-3xl uppercase">List Data Kegiatan</h1>
    </div>
    <div class="my-8">
        <button type="button" data-modal-target="tambah-kegiatan" data-modal-toggle="tambah-kegiatan"
            class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
            Kegiatan</button>
    </div>

    @include('admin.tambahkegiatan')

    <table class="mt-5 table-auto w-full text-base">
        <thead class="border-b-2">
            <tr class="uppercase text-sm">
                <th class="p-3">Nama Kegiatan</th>
                <th class="p-3">Tanggal Kegiatan</th>
                <th class="p-3">Lokasi</th>
                <th class="p-3">Deskripsi</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $items)
                <tr class="border-b odd:bg-white even:bg-gray-100">
                    <td class="p-5 w-48 text-center">{{ $items->nama_kegiatan }}</td>
                    <td class="p-5 w-48 text-center">{{ $items->tanggal_kegiatan }}</td>
                    <td class="p-5 w-56 text-center">{{ $items->lokasi_kegiatan }}</td>
                    <td class="p-5 text-justify">{{ $items->deskripsi }}</td>
                    <td class="p-5 w-64 text-center">
                        <a href="" class="py-3 px-4 border rounded-full font-medium bg-emerald-500 text-white hover:bg-emerald-700">i</a>

                        <a href="/dashboard/{{$items->id}}/data-kegiatan-edit" class="py-3 px-4 mx-2 border rounded-full font-medium bg-blue-500 text-white hover:bg-blue-700">Edit</a>

                        <form action="{{route('destroy', $items->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="py-2 px-4 border rounded-full font-medium bg-red-500 text-white hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
