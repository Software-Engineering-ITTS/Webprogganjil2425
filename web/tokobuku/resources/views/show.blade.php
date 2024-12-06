<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    @vite('resources/css/app.css')
</head>

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
            <div class="container bg-slate-500 p-5 rounded-lg mt-5">
                <h3 class="text-3xl text-center mb-5 text-white">Available Books</h3>
                <div class="grid grid-cols-3">
                    @foreach ($books as $book)
                        {{-- container each book --}}
                        <div class="container w-64 bg-slate-700 rounded-md p-7 m-7 text-white">
                            <h3 class="text-2xl font-bold mb-2">{{ $book->book_title }}</h3>
                            <p class="mb-2"><strong>Author:</strong> {{ $book->author_name }}</p>
                            <p class="mb-2"><strong>Year:</strong> {{ $book->publication_year }}</p>
                            <p class="mb-2"><strong>Price:</strong> Rp.{{ $book->price }}</p>
                            <img src="{{ asset(str_replace('public/', 'storage/', $book->cover_photo)) }}"
                                alt="{{ $book->book_title }}" class="object-contain w-full rounded-md mb-3">
                            <a href="/edit/{{ $book->id }}" class="text-blue-500 hover:text-blue-700">
                                <i class=""> Edit</i>
                            </a>
                        </div>
                    @endforeach
                </div>
        </main>
    </div>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</body>

</html>