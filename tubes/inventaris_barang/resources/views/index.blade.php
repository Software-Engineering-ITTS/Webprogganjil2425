<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Bu Sudjarmiati</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body>
    <div class="relative h-screen w-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://cdn.wallpapersafari.com/7/99/D40f97.jpg');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <div class="relative flex h-full items-center justify-center">
            <div class="text-center text-white">

                <!-- TULISAN ATAU APALAH -->
                <div class="mb-10 pt-0">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Toko Bu Sudjarmiati</h1>
                    <p class="text-lg mb-4">Tempat terpercaya untuk kebutuhan sehari-hari Anda sejak dulu.</p>
                    <p class="text-md italic mb-8">"Dua Tiga Kucing Berlari, yaudah."</p>
                </div>


                <!-- Login FORM CARD-->
                <div class="dark:bg-slate-900 dark:text-white p-6 rounded-lg shadow-lg max-w-sm mx-auto">
                    <h2 class="text-2xl font-bold text-white mb-4 text-center">Login</h2>
                    <form method="POST" action="{{ route('do-login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="username" class="flex text-sm font-medium text-white m-2">Username</label>
                            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg text-gray-800 focus:outline-none focus:ring focus:border-pink-500" required />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="flex text-sm font-medium text-white m-2">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full px-3 py-2 border rounded-lg text-gray-800 focus:outline-none focus:ring focus:border-pink-500"
                                    required />
                                <button type="button"
                                    id="togglePassword"
                                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-800 focus:outline-none">
                                    <i class="fas fa-eye-slash" id="passwordIcon"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- SHOW HIDE PASSWORD -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
                    
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';

            passwordIcon.classList.toggle('fa-eye');
            passwordIcon.classList.toggle('fa-eye-slash');
        });
    </script>


</body>

</html>