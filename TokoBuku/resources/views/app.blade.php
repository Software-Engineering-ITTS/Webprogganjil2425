<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>maruko's library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-1">
            <div class="flex justify-center items-center gap-4">
                <img src="https://i.pinimg.com/736x/ae/4e/fb/ae4efb09d91d78edb320b05b2c193a06.jpg"
                    alt="Logo" class="h-20 w-20 object-cover rounded-full">
                <h1 class="text-2xl font-bold text-amber-600">maruko's library</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 text-amber-950">
                    <li><a href="/app.blade.php" class="hover:text-amber-200">Home</a></li>
                    <li><a href="/book.blade.php" class="hover:text-amber-200">Shop</a></li>
                    <li><a href="#" class="hover:text-amber-200">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-80 bg-amber-100">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">こんにちは!! ^0^ </h2>
            <p class="text-lg mb-6 font-thin">“welcome to maruko-chan's library!”</p>
            <a href="/book" class="bg-white text-amber-800 px-6 py-3 rounded-full shadow-lg hover:bg-gray-100">
                explore here!!
            </a>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-amber-500 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 maruko's library. all rights reserved.</p>
        </div>
    </footer>

</body>

</html>
