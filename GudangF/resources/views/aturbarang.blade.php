@extends('index')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl mb-4">Daftar Barang</h1>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Penambah</th>
                <th class="py-2 px-4 border-b">Nama Barang</th>
                <th class="py-2 px-4 border-b">Jumlah Barang</th>
                <th class="py-2 px-4 border-b">Berat Barang</th>
                <th class="py-2 px-4 border-b">Tanggal Penambahan</th>
                <th class="py-2 px-4 border-b">Status Barang</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penambahans as $penambahan)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $penambahan->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $penambahan->NamaBar }}</td>
                    <td class="py-2 px-4 border-b">{{ $penambahan->JumlahBar }}</td>
                    <td class="py-2 px-4 border-b">{{ $penambahan->BeratBar }}</td>
                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($penambahan->DateBar)->format('d M Y') }}</td>
                    <td class="py-2 px-4 border-b">{{ $penambahan->StatusBar }}</td>
                    <td class="py-2 px-4 border-b flex space-x-2">
                        <a href="{{ route('penambahans.edit', $penambahan) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                            Edit
                        </a>

                        <form action="{{ route('penambahans.destroy', $penambahan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('ambil.form', $penambahan->id) }}" class="bg-blue-500 hover:bg-purple-700 text-white font-bold py-1 px-2 rounded">
                            Ambil
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
