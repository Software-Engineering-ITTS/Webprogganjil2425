@include('sidebar')

<main class="ml-64 p-6">
    <div class="m-5 space-y-5">
        <h1 class="font-medium text-2xl">Daftar List Buku</h1>
        <div class="">
            <button type="button" data-modal-target="tambah-buku-form" data-modal-toggle="tambah-buku-form"
                class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
                Buku</button>
        </div>

        @include('create')

        <div>
            <div class="p-2 rounded-t-lg bg-teal-300">
                <h1 class="text-2xl">Buku</h1>
            </div>
            <div class="border rounded-b-md">
                <table class="table-auto w-full text-md">
                    <thead class="uppercase bg-slate-100">
                        <tr class="border">
                            <th class="p-3 border-r-2">No</th>
                            <th class="p-3 border-r-2">Cover Buku</th>
                            <th class="p-3 border-r-2">Judul</th>
                            <th class="p-3 border-r-2">Penulis</th>
                            <th class="p-3 border-r-2">Harga</th>
                            <th class="p-3 border-r-2">Deskripsi</th>
                            <th class="p-3 border-r-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($book as $items)
                            <tr class="border">
                                <td class="p-3 border-r-2">{{ $items->id }}</td>
                                <td class="p-3 border-r-2"><img class="size-8" src="img/{{ $items->img }}"
                                        alt=""></td>
                                <td class="p-3 border-r-2">{{ $items->judul }}</td>
                                <td class="p-3 border-r-2">{{ $items->penulis }}</td>
                                <td class="p-3 border-r-2">{{ $items->harga }}</td>
                                <td class="p-3 border-r-2">{{ $items->deskripsi }}</td>
                                <td class="p-3 flex justify-center">
                                    <button
                                        class="w-20 bg-blue-600 text-white rounded-lg p-2 m-2 hover:bg-blue-800">Edit</button>
                                    <form action="{{ route('destroy', $items->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="w-20 bg-red-600 text-white rounded-lg p-2 m-2 hover:bg-red-800" data-confirm-delete="true">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</main>
