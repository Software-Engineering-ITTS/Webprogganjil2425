@include('layouts.dashboard')

<main class="ml-64 p-6">
    <div class="m-5 space-y-5">
        <h1 class="font-medium text-2xl">Daftar List Buku</h1>
        <div class="">
            <button type="button" data-modal-target="tambah-buku-form" data-modal-toggle="tambah-buku-form"
                class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
                Buku</button>
        </div>

        @include('layouts.tambahbuku')

        <div>
            <div class="p-2 rounded-t-lg bg-teal-300">
                <h1 class="text-2xl">Buku</h1>
            </div>
            <div class="border rounded-b-md">
                <table class="table-auto w-full text-md">
                    <thead class="uppercase bg-slate-100">
                        <tr class="border">
                            <th class="p-3 border-r-2">Cover Buku</th>
                            <th class="p-3 border-r-2">Judul</th>
                            <th class="p-3 border-r-2">Penulis</th>
                            <th class="p-3 border-r-2">Kategori</th>
                            <th class="p-3 border-r-2">Harga</th>
                            <th class="p-3 border-r-2">Deskripsi</th>
                            <th class="p-3 border-r-2">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($dataBuku as $items)
                            <tr class="border">
                                <td class="p-3 border-r-2"><img class="size-8" src="{{ Storage::url($items->cover) }}"
                                        alt=""></td>
                                <td class="p-3 border-r-2">{{ $items->judul }}</td>
                                <td class="p-3 border-r-2">{{ $items->penulis }}</td>
                                <td class="p-3 border-r-2">{{ $items->kategori }}</td>
                                <td class="p-3 border-r-2">{{ $items->harga }}</td>
                                <td class="p-3 border-r-2">{{ $items->deskripsi }}</td>
                                <td class="p-3 w-56">
                                    <button class="w-20 bg-blue-600 text-white rounded-lg p-2 m-2">Edit</button>
                                    <button class="w-20 bg-red-600 text-white rounded-lg p-2 m-2">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
