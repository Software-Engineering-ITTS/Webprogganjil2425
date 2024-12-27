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

    <form action="{{ route('search.kegiatan') }}" method="GET">
        <div class="flex relative w-fit">
            <input type="text" name="search" id="search"
                class="rounded-full text-sm w-56 hover:ring-blue-500 hover:ring-1" placeholder="Search...">
            <div class="absolute left-[180px]">
                <button class="p-2" type="submit"><img class="w-5"
                        src="https://img.icons8.com/?size=100&id=132&format=png&color=000000" alt=""></button>
            </div>
        </div>
    </form>

    <table class="mt-5 table-auto w-full text-base">
        <thead class="border-b-2">
            <tr class="uppercase text-sm">
                <th class="p-3">Nama Kegiatan</th>
                <th class="p-3">Tanggal Kegiatan</th>
                <th class="p-3">Lokasi</th>
                <th class="p-3">Waktu</th>
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
                    <td class="p-5 w-56 text-center">{{ $items->waktu_kegiatan }}</td>
                    <td class="p-5 text-justify">{{ $items->deskripsi }}</td>
                    <td class="p-5 w-64 text-center">
                        <a href="/dashboard/data-kegiatan/info{{$items->id}}"
                            class="py-[9px] px-4 border rounded-full font-medium bg-emerald-500 text-white hover:bg-emerald-700">i</a>
                        <a href="/dashboard/{{ $items->id }}/data-kegiatan-edit"
                            class="py-[9px] px-4 mx-2 border rounded-full font-medium bg-blue-500 text-white hover:bg-blue-700">Edit</a>
                        <form action="{{ route('destroy', $items->id) }}" method="POST" class="inline">
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
    <div class="">
        <div class="mt-4 text-center">
            <p>{{ $kegiatans->firstItem() }} of {{ $kegiatans->total() }}</p>
        </div>
        <div class="relative bottom-8">
            {!! $kegiatans->links() !!}
        </div>
    </div>
</main>
