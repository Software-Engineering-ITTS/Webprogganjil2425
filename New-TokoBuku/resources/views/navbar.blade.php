
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

    
    <section class="bg-gradient-to-r from-blue-300 to-white-400 text-white py-40">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Hallow! Welcome To Doraemon's Store Book</h2>
            <p class="text-lg mb-6">
                “The beauty of reading lies not only in the acquisition of knowledge, but also in the joy of discovery. Every book is a gateway to a new adventure, where the only limit is our imagination. Through reading, we engage in the dance of time of curiosity and enlightenment, constantly growing and developing with each story we embrace.”</p>
            <a href="/belibuku" class="bg-white text-blue-300 px-6 py-3 rounded-full shadow-lg hover:bg-gray-100">
                More
            </a>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-blue-300 text-white py-6">
        <div class="container mx-auto text-center">
          <p>&copy; Doraemon's Store Book 2024. All Rights Reserved.</p>
        </div>
      </footer>

</body>

</html>
