@include('sidebar')

<main class="ml-64 p-6">
    <div class="container mx-auto py-6">
        <button type="button" data-modal-target="tambah-buku-form" data-modal-toggle="tambah-buku-form"
        class="bg-teal-300 font-medium border rounded-lg p-2 hover:text-white">Tambah
        Buku</button>

        @include('create')

        <h2 class="text-2xl font-bold mt-4">List Buku</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead class="bg-gray-200 uppercase">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">judul</th>
                    <th class="border border-gray-300 px-4 py-2">penulis</th>
                    <th class="border border-gray-300 px-4 py-2">harga</th>
                    <th class="border border-gray-300 px-4 py-2">deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="text-center odd:bg-white even:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $items->judul }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->penulis }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->harga }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $items->deskripsi }}</td>
                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                        <a href="/transaksi/{{ $items->id }}/edit" 
                           class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-600">
                            Beli
                        </a>
                        <a href="/toko/{{ $items->id }}/edit" 
                           class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form method="POST" action="/toko/{{ $items->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button type="submit" 
                                    class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</main>