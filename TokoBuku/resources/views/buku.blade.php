<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>buku</title>
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
                    <li><a href="app.blade.php" class="hover:text-green-600">Home</a></li>
                    <li><a href="buku.blade.php" class="hover:text-green-600">Shop</a></li>
                    <li><a href="#" class="hover:text-green-600">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <section class="container mx-auto my-16">
        <h3 class="text-3xl font-bold text-green-700 text-center mb-12">Best Sellers</h3>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <div
                class="bg-gradient-to-r from-green-600 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/items/Cover_Depan_Insecurity_Is_My_Middle_Name.jpg"
                    alt="Buku 1" class="w-1/3 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-green-800">Insecurity Is My Middle Name</h4>
                    <p class="text-gray-600">Penulis: Alvi Syahrin</p>
                    <p class="text-gray-600">Sinopsis: “Jika kamu masih mengaitkan ‘beautiful’ dengan fisik, well you’ve
                        missed a lot of real beautiful things. Menurutku, ‘beautiful’ ini banyak macamnya. Ada yang
                        cantik tutur katanya, lembutnya cara dia berbicara, begitu hati-hati dalam setiap ucapannya dan
                        menenangkan untuk didengar.</p>
                    <p class="text-green-600 font-bold mt-4">Rp. 89.100</p>
                    <br>
                    <a href="/keranjang" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        + Keranjang
                    </a>
                </div>
            </div>


            <div class="bg-gradient-to-r from-green-600 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/products/narrimyna2.png"
             alt="Buku 2" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-green-800">Ayah, Ini Arahnya ke Mana, ya?</h4>
          <p class="text-gray-600">Penulis: Khoirul Trian</p>
          <p class="text-gray-600">Sinopsis: Ayah, ternyata benar ya. Setelah dewasa kita semua harus punya banyak uang. Harus bekerja lebih keras lagi, harus bertarung dengan isi kepala sendiri. Harus menyampingkan banyak keinginan untuk sekadar tetap bertahan hidup sampai bertemu pagi lagi.</p>
          <p class="text-green-600 font-bold mt-4">Rp. 79.000</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Keranjang
          </a>
        </div>
      </div>


      <div class="bg-gradient-to-r from-green-600 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/items/Home_Sweet_Loan_cov.jpg"
             alt="Buku 2" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-green-800">Home $weet loan</h4>
          <p class="text-gray-600">Penulis: Almira Bastari</p>
          <p class="text-gray-600">Sinopsis: Kita semua pernah membuat kesalahan. Kita harus menyesali kesalahan kita dan belajar dari situ, tapi jangan pernah terus membawa kesalahan itu ke masa depan. Itulah yang dikisahkan dalam Anne of Avonlea.</p>
          <p class="text-green-600 font-bold mt-4">Rp. 76.000</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Keranjang
          </a>
        </div>
      </div>

            <!-- Buku 4 -->
            <div class="bg-gradient-to-r from-green-600 to-white-400, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/picture_meta/2023/6/7/dwpcvu5ujrsjc8ka7m95oc.jpg"
             alt="Buku 3" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-green-800">Anne of Avonlea</h4>
          <p class="text-gray-600">Penulis: Lucy M. Montgomery</p>
          <p class="text-gray-600">Sinopsis: Kita semua pernah membuat kesalahan. Kita harus menyesali kesalahan kita dan belajar dari situ, tapi jangan pernah terus membawa kesalahan itu ke masa depan. Itulah yang dikisahkan dalam Anne of Avonlea.</p>
          <p class="text-green-600 font-bold mt-4">Rp. 80.100</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Keranjang
          </a>
        </div>
      </div>>


        <div class="container mx-auto p-4">
            <a href="{{ route('tambahbuku') }}"
                 class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Buku</a>
        </div>



    </section>


    <footer class="bg-green-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 zoro's bookstore. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
