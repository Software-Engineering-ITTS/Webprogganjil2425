@extends('layouts.app') {{-- Panggil layout utama --}}

@section('title', 'Daftar Buku') {{-- Judul halaman --}}

@section('content') {{-- Konten khusus untuk halaman ini --}}
    <h1>Pembelian Buku</h1>

    {{-- Pesan sukses atau error --}}
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Form untuk pembelian --}}
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <div>
            <label for="buku_id">Pilih Buku:</label>
            <select name="buku_id" id="buku_id" required>
                @foreach($bukuses as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }} (Stok: {{ $buku->stok }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah_ordr">Jumlah Pesanan:</label>
            <input type="number" name="jumlah_ordr" id="jumlah_ordr" min="1" required>
        </div>

        <div>
            <label for="pembeli">Nama Pembeli:</label>
            <input type="text" name="pembeli" id="pembeli" required>
        </div>

        <button type="submit">Beli</button>
    </form>
@endsection
