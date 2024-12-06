<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>zoro's bookstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex justify-center items-center gap-4">
                <img src="https://ih1.redbubble.net/image.5278499885.1380/flat,750x,075,f-pad,750x1000,f8f8f8.u1.jpg"
                    alt="Logo Zoro's Bookstore" class="h-8 w-8 object-cover rounded-full">
                <h1 class="text-2xl font-bold text-green-600">zoro's bookstore</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 text-green-700">
                    <li><a href="app.blade.php" class="hover:text-blue-600">Home</a></li>
                    <li><a href="book.blade.php" class="hover:text-blue-600">Shop</a></li>
                    <li><a href="#" class="hover:text-blue-600">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="flex justify-center items-center">
        <div class="w-2/3 p-6 shadow-lg bg-white rounded-md mt-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-5">Form Tambah Buku</h1>
            <form action="/admin/tambahbuku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan judul buku..." require>
                </div>
                <div class="mb-5">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan penulis buku..." require>
                </div>
                <div class="mb-5">
                    <label for="sinopsis">Sinopsis</label>
                    <input type="text" name="sinopsis id="sinopsis" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan sinopsis buku..." require>
                </div>
                <div class="mb-5">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan harga buku..." require>
                </div>
                <div class="mb-5">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan stok buku..." require>
                </div>
                <div class="mb-5">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="border rounded-md w-full text-base px-2 py-1" require>
                </div>
                <button type="submit" class="border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Submit</button>
            </form>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-green-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 zoro's bookstore. all rights reserved.</p>
        </div>
    </footer>

</body>

</html>
