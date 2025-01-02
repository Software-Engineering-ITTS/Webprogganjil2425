<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="icon" href="{{ URL('Image/Logo A putih.png') }}">
    @vite('resources/css/app.css')
</head>

<body>

    <section class="min-h-screen flex items-center justify-center"
        style="background-image: linear-gradient(115deg, #175584, #49b7d2)">

        <!-- Alert Messages -->
        @if ($errors->any())
        <div class="fixed top-4 right-4 z-50">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <div class="bg-cyan-900 flex flex-wrap items-center rounded-2xl shadow-lg max-w-4xl w-full">

            <!-- Image -->
            <div class="w-full sm:w-1/2">
                <img class="rounded-2xl" src="{{ URL('Image/examplejpg.jpg') }}" alt="Login Image">
            </div>

            <!-- Form -->
            <div class="w-full sm:w-1/2 px-16">
                <h2 class="font-bold text-2xl text-white">Register</h2>
                <p class="text-white text-sm mt-3">Silahkan untuk melakukan register sebagai karyawan baru! Semua pendaftar akan menjadi karyawan dengan role <strong>Staff</strong>.</p>

                <form method="POST" action="{{ route('Auth.register') }}" class="flex flex-col gap-4">
                    @csrf
                    <input class="p-2 mt-8 rounded-xl border w-full @error('name') border-red-500 @enderror" type="text" name="name"
                        placeholder="Name" value="{{ old('name') }}" required>
                    <input class="p-2 mt-2 rounded-xl border w-full @error('username') border-red-500 @enderror" type="text" name="username"
                        placeholder="Username" value="{{ old('username') }}" required>
                    <div class="relative">
                        <input id="js-pass" class="p-2 mt-2 rounded-xl border w-full @error('password') border-red-500 @enderror" type="password" name="password"
                            placeholder="Password" required>
                    </div>
                    <input type="hidden" name="role" value="staff"> <!-- Menyimpan role secara otomatis -->

                    <button type="submit" class="bg-cyan-400 rounded-xl border mt-4 py-2 w-full hover:bg-cyan-500 transition">Register</button>

                    <!-- Teks menu login -->
                    <div>
                        <p class="text-white text-sm mt-3 right-3">Sudah punya akun? <a href="/login" class="underline">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        setTimeout(function() {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => alert.remove());
        }, 5000);
    </script>

</body>

</html>
