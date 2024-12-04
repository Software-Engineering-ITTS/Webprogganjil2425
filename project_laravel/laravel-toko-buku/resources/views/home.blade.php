<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="border-b border-gray-600">
        <div class="mt-5 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
                <a href="" class="flex items-center">
                    <img class=" h-20 w-20 me-2" src="https://png.pngtree.com/png-clipart/20220909/original/pngtree-books-vectro-illustration-png-image_8522264.png" alt="">
                    <span class="font-bold text-3xl">BokoBoy</span>
                </a>
            <div>
                <ul class=" flex text-lg">
                    <li class="mx-10">
                        <a href="" class="font-bold hover:text-blue-700">Home</a>
                    </li>
                    <li class="mx-10">
                        <a href="" class="mx-5 font-bold hover:text-blue-700">Kategori</a>
                    </li>
                    <li class="mx-10">
                        <a href="" class="font-bold hover:text-blue-700">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <button type="submit" onclick="window,location.href='{{route('login')}}'" class="px-4 py-2 w-24 text-white bg-blue-700 font-medium rounded-lg">Login</button>
            </div>
        </div>
    </nav>
</body>

</html>
