@extends('layout.app')
@section('title', 'Edit-Buku')

@section('content')
<body>
    <div class="mt-5 items-center flex flex-col justify-center gap-10">
        <h1 class="font-bold text-3xl">
            Edit <span class="text-yellow-500">Buku</span>
        </h1>    

        <form method="POST" action="{{ route('Book.update', $books->id) }}" class="text-black flex bg-gray-900 rounded-3xl border px-52 py-16 flex-col justify-center items-center gap-10" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Title : </label>
                <input type="text" id="title" name="title"  class="px-1 py-2 rounded-xl"  value="{{ $books->title }}">  
            </div>

            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Author</label>
                <input type="text" id="author" name="author" value="{{ $books->author }} "  class="px-1 py-2 rounded-xl" >  
            </div>

            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Tanggal Terbit</label>
                <input type="date" id="tanggal_terbit"  class="px-1 py-2 rounded-xl"  name="tanggal_terbit" value="{{ $books->tanggal_terbit }}">  
            </div>
          
            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Cover Buku</label>
                <input type="file" id="cover_buku" name="cover_buku"  class="px-1 py-2 rounded-xl text-white" value="{{ $books->cover_buku }}">  
            </div>

            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Pdf Buku</label>
                <input type="file" id="pdf" name="pdf"  class="px-1 py-2 rounded-xl text-white"  value="{{ $books->pdf }}">  
            </div>

            <div class="flex gap-10">
                <label for="" class="text-white font-bold">Harga Buku</label>
                <input type="number" id="harga" name="harga" class="px-1 py-2 rounded-xl  [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none "  value="{{ $books->harga }}">  
            </div>

            <div class="flex gap-10">
                <label class="text-white font-bold" for="">Stok Buku</label>
                <input type="number" id="stok" name="stok" class="px-1 py-2 rounded-xl  [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none " value="{{ $books->stok }}">  
            </div>

            <div class="flex gap-10">
                <label class="text-white font-bold" for="">Kategori Buku</label>
                <select name="category_id" id="category_id" class="px-1 py-2 rounded-xl">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                    @endforeach
                </select>
            </div>
                <button class="rounded-xl  font-bold px-10 py-3 bg-yellow-500 hover:bg-green-500 hover:text-white duration-300 hover:scale-110" type="submit">Update</button>
        </form>
    </div>
</body>
@endsection
