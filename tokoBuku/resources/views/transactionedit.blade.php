@extends('layout.app')
@section('title', 'Edit Transaction')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center mt-10">
        <h1 class="font-bold text-2xl">Edit Transaction</h1>    

        <form method="POST" action="{{ route('Transaction.update', $transactions->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="flex flex-col justify-center mt-10 gap-10">
                <div class="flex gap-5">
                    <label for="book_id">Title Buku:</label>
                    <select name="book_id" id="book_id" class="bg-black text-white">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ $book->id == $transactions->book_id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-5">
                    <label for="tanggal_beli">Tanggal Transaksi:</label>
                    <input type="date" id="tanggal_beli" name="tanggal_beli" class="bg-black text-white" value="{{ $transactions->tanggal_beli }}">
                </div>

                <div class="flex gap-5">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-select bg-black text-white">
                        <option value="succes" {{ $transactions->status == 'succes' ? 'selected' : '' }}>Succes</option>
                        <option value="none" {{ $transactions->status == 'none' ? 'selected' : '' }}>None</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="bg-black w-full h-10 rounded-2xl hover:bg-yellow-400 hover:text-black duration-500 hover:scale-110">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
