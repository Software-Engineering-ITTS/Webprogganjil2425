@extends('layout.app')
@section('title', 'Tambah Transaction')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center  ">
          

        <form method="POST" action="/Transaction" class="text-black flex bg-gray-900 rounded-3xl border px-52 py-16 flex-col justify-center items-center gap-10" enctype="multipart/form-data">
            <h1 class="font-bold text-2xl text-white">
                Tambah <span class="text-yellow-500">Transaction</span>
            </h1> 
            @csrf
            <div class="flex flex-col justify-center mt-10 gap-10 ">
                <div class="flex gap-5">
                    <label class="font-bold text-white" for="">Title Buku :</label>
                    <select name="book_id" id="book_id" class="px-1 py-2 rounded-xl">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-5">
                    <label for="tanggal_beli" class="font-bold text-white">Tanggal Transaksi : </label>
                    <input type="date" id="tanggal_beli" name="tanggal_beli" class="px-1 py-2 rounded-xl">  
                </div>

                <div class="flex gap-5">
                    <label for="status" class="font-bold text-white">Status : </label>
                    <select name="status" id="status" class="form-select px-2 py-2 rounded-xl" >
                        <option value="succes">Success</option>
                        <option value="none">None</option>
                    </select>
                </div>

                <div class="items-center flex justify-center">
                    <button type="submit" class="rounded-xl font-bold px-10 py-3 bg-yellow-500 hover:bg-green-500 hover:text-white duration-300 hover:scale-110">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
