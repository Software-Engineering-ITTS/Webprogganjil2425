<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    @vite('resources/css/app.css')
</head>

{{-- form edit can't acces directly form navbar. it will be error. 
but the function is when on show, click up the edit. it wil go on /edit --}}

<body class="bg-black">
    {{-- page container --}}
    <div class="container mx-auto bg-slate-700 p-7 m-9 rounded-lg">
        <header>
            {{--  --}}
            <h1 class="bg-slate-400 text-7xl text-center rounded-lg p-5 mb-11">Book Store</h1>
        </header>
        {{--  --}}
        <nav class="bg-gray-800 mb-7 rounded-xl">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-center">
                        <a href="/"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
                        <a href="/add"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
                            Book</a>
                        <a href="/show"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Show
                            Book</a>
                        <a href="/edit"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Edit
                            Book</a>
                    </div>
                </div>
            </div>
        </nav>

        {{--  --}}
        <main>
            <form action="/edit/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="book_title" class="text-white">Book Title</label>
                    <input type="text" name="book_title" id="book_title"
                        value="{{ old('book_title', $book->book_title) }}" class="w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="author_name" class="text-white">Author Name</label>
                    <input type="text" name="author_name" id="author_name"
                        value="{{ old('author_name', $book->author_name) }}" class="w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="publication_year" class="text-white">Publication Year</label>
                    <input type="number" name="publication_year" id="publication_year"
                        value="{{ old('publication_year', $book->publication_year) }}" class="w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="synopsis" class="text-white">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" rows="3" class="w-full p-2 rounded">{{ old('synopsis', $book->synopsis) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="text-white">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}"
                        class="w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="cover_photo" class="text-white">Cover Photo</label>
                    <input type="file" name="cover_photo" id="cover_photo" class="w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 p-2 rounded text-white">Update Book</button>
                </div>
            </form>
        </main>
    </div>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</body>

</html>
