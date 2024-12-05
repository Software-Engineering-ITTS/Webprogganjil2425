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
            <form action="" method="POST">
                <div class="container bg-slate-500 p-5 rounded-lg mt-5">
                    <h3 class="text-3xl text-center mb-5">Edit Book</h3>
                    <div class="flex flex-col">
                        <label for="book-title" class="mb-1 mt-3">Book Title</label>
                        <input type="text" name="book-title" id="book-title" class="rounded-md">
                    </div>
                    <div class="flex flex-col">
                        <label for="author-name" class="mb-1 mt-3 ">Author Name</label>
                        <input type="text" name="author-name" id="author-name" class="rounded-md">
                    </div>
                    <div class="flex flex-col">
                        <label for="publication-year" class="mb-1 mt-3 ">Publication Year</label>
                        <input type="text" name="publication-year" id="publication-year" class="rounded-md">
                    </div>
                    <div class="flex flex-col">
                        <label for="synopsis" class="mb-1 mt-3">Synopsis</label>
                        <input type="text" name="synopsis" id="synopsis" class="rounded-md">
                    </div>
                    <div class="flex flex-col">
                        <label for="price" class="mb-1 mt-3">Price</label>
                        <input type="text" name="price" id="price" class="rounded-md">
                    </div>
                    <div class="flex flex-col">
                        <label for="cover-photo" class="mb-1 mt-3">Cover Book</label>
                        <input type="file" name="cover-photo" id="cover-photo">
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-blue-700 p-2 rounded-xl font-bold text-white hover:bg-blue-500">Edit
                            Book</button>
                    </div>
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
