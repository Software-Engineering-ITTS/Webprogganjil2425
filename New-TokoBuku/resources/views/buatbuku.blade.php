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

  <section class="container mx-auto my-16">
    <h3 class="text-3xl font-bold text-blue-950 text-center mb-12"> Tambah Buku Baru </h3>










  <footer class="bg-blue-300 text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; Doraemon's Store Book 2024. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
