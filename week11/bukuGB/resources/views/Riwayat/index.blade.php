@extends('layouts.app') {{-- Panggil layout utama --}}

@section('title', 'Riwayat Transaksi') {{-- Judul halaman --}}

@section('content') {{-- Konten khusus untuk halaman ini --}}
    <h1>Riwayat Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Pembeli</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->bukus->judul }}</td>
                <td>{{ $transaksi->jumlah_ordr }}</td>
                <td>{{ $transaksi->hrg_satuan }}</td>
                <td>{{ $transaksi->hrg_total }}</td>
                <td>{{ $transaksi->pembeli }}</td>
                <td>{{ $transaksi->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
