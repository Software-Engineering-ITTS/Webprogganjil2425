@extends('layout')

@section('title')
    Toko Buku
@endsection

@section('isi')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-400">
        <div class="flex justify-between mt-8">
            <h1 class="font-bold text-4xl">Daftar Buku</h1>
            <a href="{{ route('barang.create') }}" class="bg-green-700 rounded-xl p-3 px-5 mr-7 text-white">Tambah Buku</a>
        </div>
        <div class="mt-6">
            <table class="table-auto w-full">
                @if ($bukus->isEmpty())
                <tr>
                    <td colspan="8" class="text-center font-semibold rounded-lg text-white p-4 bg-red-500 ">No books available, Tambahkan untuk menambahkan buku</td>
                </tr>
            @else
                <thead>
                    <tr>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">ID Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Judul Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Cover Buku</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Pengarang</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Kategori</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Stok</div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">Harga</div>
                        </th>
                        <th class="px-4 py-2">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($bukus as $i => $buku)
                            <tr>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $i + 1 }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $buku->judul }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">
                                    <img src="{{ asset('img/'.$buku->fotos) }}" alt="" width="100">
                                </td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $buku->pengarang }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $buku->kategori }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $buku->stock }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">{{ $buku->harga }}</td>
                                <td class="border-2 border-green-900 px-4 py-2 w-48">
                                    <form action="{{ route('barang.destroy', $buku->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('barang.edit', $buku->id) }}"
                                            class="bg-blue-600 rounded-xl p-3 px-6 text-white mb-3 flex justify-center">Edit</a>

                                        <button type="submit"
                                            class="bg-red-600 rounded-xl p-3 px-14 text-white flex justify-center">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="mt-4">
                {{ $bukus->links() }}
            </div>
        </div>
    </div>
@endsection
