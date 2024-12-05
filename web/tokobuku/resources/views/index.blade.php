<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Buku</title>
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
            {{-- container action  --}}
            <div class="container size-max mx-auto bg-slate-500 p-5 rounded-lg mt-5">
                <h3 class="text-3xl text-center mb-5">Welcome to My Book Store</h3>
            </div>
    </div>
    </main>
    <footer>
        {{--  --}}
    </footer>
    </div>
</body>

</html>