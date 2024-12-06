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

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-600 to-white-400 text-white py-40">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Holla! welcome to zoro's bookstore!</h2>
            <p class="text-lg mb-6">“Wise people learn when they can; fools learn when they must.”</p>
            <a href="/book" class="bg-white text-green-600 px-6 py-3 rounded-full shadow-lg hover:bg-gray-100">
                view more
            </a>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-green-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 zoro's bookstore. all rights reserved.</p>
        </div>
    </footer>

</body>

</html>
