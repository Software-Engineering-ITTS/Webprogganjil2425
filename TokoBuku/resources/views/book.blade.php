<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>the collections</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Header -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex justify-center items-center gap-4">
            <img src="https://i.pinimg.com/736x/ae/4e/fb/ae4efb09d91d78edb320b05b2c193a06.jpg"
                alt="Logo" class="h-20 w-20 object-cover rounded-full">
            <h1 class="text-2xl font-bold text-amber-600">maruko's library</h1>
        </div>
        <nav>
            <ul class="flex space-x-6 text-amber-950">
                <li><a href="app.blade.php" class="hover:text-amber-200">Home</a></li>
                <li><a href="book.blade.php" class="hover:text-amber-200">Shop</a></li>
                <li><a href="#" class="hover:text-amber-200">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

  <!-- isi buku -->
  <section class="container mx-auto my-16">
    <h3 class="text-3xl font-bold text-amber-700 text-center mb-12 font-serif">Maruko's top reads!</h3>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

      <div class="bg-amber-600, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://m.media-amazon.com/images/I/81y9uCHoxrL._AC_UF894,1000_QL80_.jpg"
             alt="Buku 1" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-amber-800">The Silent Patient by Alex Michaelides</h4>
          <p class="text-gray-600">Alicia's refusal to speak and provide any explanation turned a domestic tragedy into a much bigger case. It became a mystery that captured the public imagination and made Alicia a household name. Will Alicia finally speak again? Will Theo be able to persuade Alicia to explain what happened? Why did Alicia remain silent for 6 years if she was not the perpetrator of Gabriel's murder? What was Alicia's reason for killing her husband?</p>
          <p class="text-black font-bold mt-4">Rp. 150.000,00</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-800">
            add to cart
          </a>
        </div>
      </div>


      <div class="bg-amber-600, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1638425885i/16299.jpg"
             alt="Buku 2" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-amber-800">And Then There Were None by Agatha Christie</h4>
          <p class="text-gray-600">Before the weekend is out, there will be none. Who has choreographed this dastardly scheme? And who will be left to tell the tale? Only the dead are above suspicion.</p>
          <p class="text-black font-bold mt-4">Rp. 250.000,00</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-800">
            add to cart
          </a>
        </div>
      </div>


      <div class="bg-amber-600, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://www.ubuy.co.id/productimg/?image=aHR0cHM6Ly9pbWFnZXMtY2RuLnVidXkuY28uaWQvNjViYjg1ODdlYzIwNWI3ZGU3MDQyMmRhLXRoZS1zZXZlbi1odXNiYW5kcy1vZi1ldmVseW4taHVnby1hLmpwZw.jpg"
             alt="Buku 3" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-amber-800">The Seven Husbands of Evelyn Hugo by Taylor Jenkins</h4>
          <p class="text-gray-600">Aging and reclusive Hollywood movie icon Evelyn Hugo is finally ready to tell the truth about her glamorous and scandalous life. But when she chooses unknown magazine reporter Monique Grant for the job, no one is more astounded than Monique herself. Why her? Why now?</p>
          <p class="text-black font-bold mt-4">Rp. 125.000,00</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-800">
            add to cart
          </a>
        </div>
      </div>

      <!-- Buku 4 -->
      <div class="bg-amber-600, flex bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="https://images-cdn.ubuy.co.id/634f5f4fc0c9cf3dd063a0e3-gravity-falls-journal-3-special-edition.jpg"
             alt="Buku 4" class="w-1/3 object-cover">
        <div class="p-6">
          <h4 class="text-xl font-bold text-amber-800">Journal #3 by Stanford Pines</h4>
          <p class="text-gray-600">The third and final installment in a series of journals preceded by Journal #1 and Journal #2. It contains an encyclopedic collection of information on the variety of paranormal and supernatural creatures living in Gravity Falls, Oregon.</p>
          <p class="text-black font-bold mt-4">Rp. 150.000,00</p>
          <br>
          <a href="/keranjang" class="mt-4 bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-800">
           add to cart
          </a>
        </div>
      </div>
  </section>

  <footer class="bg-amber-500 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 maruko's library. all rights reserved.</p>
    </div>
</footer>

</body>
</html>
