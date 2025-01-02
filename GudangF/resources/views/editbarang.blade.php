

@extends('index')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl mb-4">Edit Barang</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penambahans.update',$penambahan->id) }}" method="POST"class="space-y-4">
        @csrf
        @method('PUT')

        <div>   


        <div>
            <label for="NamaBar" class="block font-bold">Nama Barang:</label>
            <input type="text" id="NamaBar" name="NamaBar" value="{{ $penambahan->NamaBar }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="JumlahBar" class="block font-bold">Jumlah Barang:</label>
            <input type="text" id="JumlahBar" name="JumlahBar" value="{{ $penambahan->JumlahBar }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="BeratBar" class="block font-bold">Berat Barang (kg):</label>
            <input type="text" step="0.01" id="BeratBar" name="BeratBar" value="{{ $penambahan->BeratBar }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="DateBar" class="block font-bold">Tanggal Penambahan:</label>
            <input type="date" id="DateBar" name="DateBar" value="{{ $penambahan->DateBar }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="StaturBar" class="block font-bold">Status pengiriman barang:</label>
            <select type="text" id="StatusBar" name="StatusBar" value="{{ $penambahan->StatusBar}}" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value=""></option>
            <option value="dikirim">dalam pengiriman</option>
            </select>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</div>
@endsection
