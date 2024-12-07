@extends('layouts.app')

@section('title', 'Toko Buku Sederhana')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Toko Buku Sederhana</h1>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    <a href="{{ route('transactions.index') }}" class="btn btn-info mb-3">Lihat Transaksi</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>COVER</th>
                    <th>JUDUL</th>
                    <th>PENULIS</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td class="text-center">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" width="80"
                                    class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak Ada Cover</span>
                            @endif
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <form action="{{ route('books.buy', $book->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1" max="{{ $book->stock }}"
                                    class="form-control mb-2" style="width: 80px; display: inline;">
                                <button type="submit" class="btn btn-success btn-sm">Beli</button>
                            </form>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada buku tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection