@extends('layout.app')
@section('title', 'Tambah-Buku')

@section('content')
<body>
    <div class=" mt-10 gap-10 flex flex-col justify-center items-center">
        
        <form method="POST" action="/Book" class="flex bg-gray-900 rounded-3xl border px-52 py-16 flex-col justify-center items-center gap-10" enctype="multipart/form-data">
            <h1 class="font-bold text-2xl">
                Tambah <span class="text-yellow-500">Buku</span>
            </h1>    
            @csrf
            <div class="flex gap-10">
                <label for="" class="font-bold">Title : </label>
                <input type="text" id="title" name="title" class="text-black animate-pulse focus-within:animate-none  py-2 rounded-xl" oninput="handleAnimateTItle()">  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Author : </label>
                <input type="text" id="author" name="author" class="text-black  py-2 animate-pulse rounded-xl focus-within:animate-none" oninput="handleAnimateAuthor()">  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Tanggal Terbit : </label>
                <input type="date" id="tanggal_terbit" name="tanggal_terbit" class="px-1 py-2 rounded-xl ">  
            </div>
          
            <div class="flex gap-10">
                <label for="" class="font-bold">Cover Buku : </label>
                <input type="file" id="cover_buku" name="cover_buku" >  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Pdf Buku : </label>
                <input type="file" id="pdf" name="pdf">  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Harga Buku : </label>
                <input type="number" id="harga" name="harga" class="text-black  py-2 rounded-xl
                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none animate-pulse focus-within:animate-none" oninput="handleAnimateHarga()"
                >  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Stok Buku :</label>
                <input type="number" id="stok" name="stok" class="text-black  py-2 rounded-xl
                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none animate-pulse focus-within:animate-none [&::-webkit-inner-spin-button]:appearance-none
                " oninput="handleAnimateStok()">  
            </div>

            <div class="flex gap-10">
                <label for="" class="font-bold">Kategori Buku :</label>
                <select name="category_id" id="category_id" class="text-black ">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class=" px-10  bg-yellow-400  text-black w-full h-10 rounded-xl hover:bg-green-500 hover:text-white duration-500 hover:scale-110 ">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const handleAnimateTItle = () => {
            const input = document.getElementById('title');

            if (input.value.trim() !== ''){
                console.log('test')
                input.classList.remove('animate-pulse')
            } else {
                input.classList.add('animate-pulse')

            }
        }

        const handleAnimateAuthor = () => {
            const input = document.getElementById('author');

            if (input.value.trim() !== ''){
                console.log('test')
                input.classList.remove('animate-pulse')
            } else {
                input.classList.add('animate-pulse')

            }
        }

        const handleAnimateHarga = () => {
            const input = document.getElementById('harga');

            if (input.value.trim() !== ''){
                console.log('test')
                input.classList.remove('animate-pulse')
            } else {
                input.classList.add('animate-pulse')

            }
        }

        const handleAnimateStok = () => {
            const input = document.getElementById('stok');

            if (input.value.trim() !== ''){
                console.log('test')
                input.classList.remove('animate-pulse')
            } else {
                input.classList.add('animate-pulse')

            }
        }
    </script>
</body>
@endsection
