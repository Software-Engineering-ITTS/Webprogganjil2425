@extends('index')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl">Daftar Barang</h1>

    
    <table class="table-auto w-full border-collapse border border-gray-300 bg-white ">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">No</th>
            <th class="py-2 px-4 border-b">Nama Penambah</th>
            <th class="py-2 px-4 border-b">Nama Barang</th>
            <th class="py-2 px-4 border-b">Jumlah Barang</th>
            <th class="py-2 px-4 border-b">Berat Barang</th>
            <th class="py-2 px-4 border-b">Tanggal Penambahan</th>
            <th class="py-2 px-4 border-b">Status Barang</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penambahans as $index => $item)
            <tr>
                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                <td class="py-2 px-4 border-b">{{ $item->NamaBar }}</td>
                <td class="py-2 px-4 border-b">{{ $item->JumlahBar }}</td>
                <td class="py-2 px-4 border-b">{{ $item->BeratBar }}</td>
                <td class="py-2 px-4 border-b">{{ $item->DateBar }}</td>
                <td class="py-2 px-4 border-b">{{ $item->StatusBar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </table>
</div>
@endsection
