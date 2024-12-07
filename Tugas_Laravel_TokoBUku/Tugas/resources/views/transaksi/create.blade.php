@extends('layout.app')

@section('title', 'Create Transaksi')

@section('content')
    <h1>Beli Buku</h1>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="book_id" class="form-label">Title</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="" disabled selected>Pilih Buku</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} (Stock: {{ $book->stock }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label for="pembeli" class="form-label">pembeli</label>
    <input type="text" name="pembeli" id="pembeli" class="form-control" required>
</div>


        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah Buku</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded-lg border border-blue-600 hover:bg-blue-600 focus:ring focus:ring-blue-300">
    Submit
</button>

    </form>
@endsection
