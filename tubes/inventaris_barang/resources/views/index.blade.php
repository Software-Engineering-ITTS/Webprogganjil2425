<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Bu Sudjarmiati</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="relative h-screen w-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/path/to/your-background-image.jpg');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <!-- Content -->
        <div class="relative flex h-full items-center justify-center">
            <div class="text-center text-white">
                <!-- Store Description -->
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di Toko Bu Sudjarmiati</h1>
                <p class="text-lg mb-4">Tempat terpercaya untuk kebutuhan sehari-hari Anda sejak dulu.</p>
                <p class="text-md italic mb-8">"Kejujuran adalah inventaris terbaik dalam berdagang."</p>

                <!-- Login Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg text-gray-800 focus:outline-none focus:ring focus:border-pink-500" required />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg text-gray-800 focus:outline-none focus:ring focus:border-pink-500" required />
                        </div>
                        <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
