@extends('layout.app')
@section('title', 'View-Buku')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center mt-10 gap-10">
        <h1 class="font-bold text-2xl">
            View Buku
        </h1>    
            <table border="1" class="table table-striped ">
                <thead class="border-4">
                    <tr >
                        <th>TItle</th>
                        <th>Author</th>
                        <th>Tanggal Terbit</th>
                        <th>Cover Buku</th>
                        <th>Pdf Buku</th>
                        <th>Harga Buku</th>
                        <th>Stok Buku</th>
                        <th>Kategori Buku</th>
                    </tr>
                </thead>
                <tbody class="border-4">
                    @foreach ($books as $book)
                        <tr class="border-4">
                            <td class="border-4">
                                {{ $book->title }}
                            </td>
                            <td class="border-4">
                                {{ $book->author }}
                            </td>
                            <td class="border-4">
                                {{ $book->tanggal_terbit }}
                            </td>
                            <td class="h-32 w-32 border-4">
                                <img src="{{ asset('storage/' . $book->cover_buku) }}" alt="Book Cover" >
                            </td class="border-4">
                            <td class="border-4">
                                {{ $book->pdf }}
                            </td>
                            <td class="border-4">
                                {{ $book->harga }}
                            </td>
                            <td class="border-4">
                                {{ $book->stok }}
                            </td>
                            <td class="border-4">
                                {{ $book->category_id }}
                            </td>
                            <td class="border-4 flex flex-col  rounded-lg text-center gap-5">
                                <a href="{{ route('Book.edit' , $book->id) }}" class="px-9 py-3 bg-blue-500">Edit</a>
                                <form action="{{  route('Book.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-9 py-3 bg-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</body>
@endsection
