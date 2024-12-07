@extends('layouts.app')

@section('title', 'Lihat Transaksi')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Transaksi</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->book->title }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection