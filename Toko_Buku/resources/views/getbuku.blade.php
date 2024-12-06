
@extends('layouts.app')
@section('content')

{{-- Halaman Home --}}
<main class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4">Buku Terbaru</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($bukus as $buku)
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="{{ $buku->img }}" alt="{{ $buku->title }}" class="w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-bold">{{ $buku->title }}</h3>
                <p class="text-gray-700">Penulis: {{ $buku->author }}</p>
                <p class="text-gray-700">Deskripsi: {{ $buku->description }}</p>
                <p class="text-gray-700">Harga: Rp{{ number_format($buku->price, 0, ',', '.') }}</p>
                <p class="text-gray-700">Stok: {{ $buku->stock }}</p>

                @if($book->stock > 0)
                <form action="{{url('/beli-buku/'.$book->id) }}" method="POST">
                    @csrf
                    <button class="bg-blue-950 text-white px-4 py-2 mt-4 rounded">Beli Sekarang</button>
                </form>
                @else
                <button class="bg-gray-500 text-white px-4 py-2 mt-4 rounded" disabled>Stok Habis</button>
                @endif
            </div>
        @endforeach
    </div>
</main>

@endsection
