<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Doraemon's Store Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex justify-center items-center gap-4">
                <img src="https://e1.pxfuel.com/desktop-wallpaper/171/768/desktop-wallpaper-gambar-doraemon-yang-lucu-imut-dan-menggemaskan-gambar-doraemon.jpg"
                    alt="Logo Doraemon" class="h-8 w-8 object-cover rounded-full">
                <h1 class="text-2xl font-bold text-blue-300">Doraemon's Store Book</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 text-blue-300">
                    <li><a href="navbar.blade.php" class="hover:text-blue-300">Home</a></li>
                    <li><a href="belibuku.blade.php" class="hover:text-blue-300">Shopping</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <!-- isi buku -->
    <section class="container mx-auto my-16">
        <h3 class="text-3xl font-bold text-green-700 text-center mb-12">Best Sellers</h3>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">


            <div
                class="bg-gradient-to-r from-blue-400 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://cdn.gramedia.com/uploads/items/716010797_doraemon_petualangan_16.jpg" alt="Buku 1"
                    class="w-1/3 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-blue-800">Doraemon Petualangan Vol. 16</h4>
                    <p class="text-blue-600">Pencipta: Fujiko F Fujio</p>
                    <p class="text-blue-600">Deskripsi: Nobita dan Kereta Api Ekspress</p>
                    <p class="text-blue-600 font-bold mt-4">Rp. 12.000 </p>
                    <p class="text-blue-600 mt-2">Stok: 20 Buku</p>
                    <form action="/belisekarang" method="GET"> <button type="submit"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-900"> Beli </button>
                    </form>
                </div>
            </div>


            <div
                class="bg-gradient-to-r from-blue-400 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://bukukita.com/babacms/displaybuku/97385_f.jpg" alt="Buku 2"
                    class="w-1/3 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-blue-800">Doraemon Petualangan Vol. 21</h4>
                    <p class="text-blue-600">Pencipta: Fujiko F Fujio Pro</p>
                    <p class="text-blue-600">Deskripsi: Nobita dan Pahlawan Bersayap</p>
                    <p class="text-blue-600 font-bold mt-4">Rp. 15.000 </p>
                    <p class="text-blue-600 mt-2">Stok: 23 Buku</p>
                    <form action="/belisekarang" method="GET"> <button type="submit"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-900"> Beli </button>
                    </form>
                </div>
            </div>


            <div
                class="bg-gradient-to-r from-blue-400 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://inc.mizanstore.com/aassets/img/com_cart/produk/GRK-078.jpg" alt="Buku 3"
                    class="w-1/3 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-blue-800">Doraemon Petualangan Vol. 18</h4>
                    <p class="text-blue-600">Pencipta: Fujiko F Fujio Pro</p>
                    <p class="text-blue-600">Deskripsi: Petualangan Nobita di Laut Selatan</p>
                    <p class="text-blue-600 font-bold mt-4">Rp. 13.000 </p>
                    <p class="text-blue-600 mt-2">Stok: 18 Buku</p>
                    <form action="/belisekarang" method="GET"> <button type="submit"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-900"> Beli </button>
                    </form>
                </div>
            </div>


            <div
                class="bg-gradient-to-r from-blue-400 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://www.bukukita.com/babacms/displaybuku/118710_f.jpg" alt="Buku 1"
                    class="w-1/3 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-blue-800">Doraemon Petualangan Vol. 3</h4>
                    <p class="text-blue-600">Pencipta: Fujiko F Fujio</p>
                    <p class="text-blue-600">Deskripsi: Nobita dalam Dunia Misteri</p>
                    <p class="text-blue-600 font-bold mt-4">Rp. 17.000 </p>
                    <p class="text-blue-600 mt-2">Stok: 30 Buku</p>
                    <form action="/belisekarang" method="GET"> <button type="submit"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-900"> Beli </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer class="bg-blue-300 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; Doraemon's Store Book 2024. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
