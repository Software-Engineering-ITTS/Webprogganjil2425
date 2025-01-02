<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL('Image/Logo A putih.png') }}">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="min-h-screen flex items-center justify-center" style="background-image: linear-gradient(115deg, #175584, #49b7d2">
        <!-- Success Message -->
        @if (session('success'))
        <div class="fixed top-4 right-4 z-50">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <!-- Error Message -->
        @if ($errors->any())
        <div class="fixed top-4 right-4 z-50">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
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
            <!-- Form -->
            <div class="w-full sm:w-1/2 px-8 sm:px-16 py-8">
                <h2 class="font-bold text-2xl text-white">Login</h2>
                <p class="text-white text-sm mt-4">Silahkan Untuk Melakukan Login Terlebih Dahulu!</p>
    
                <form method="POST" action="{{ route('Auth.login') }}" class="flex flex-col gap-4">
                    @csrf
                    <input class="p-2 mt-8 rounded-xl border w-full @error('username') border-red-500 @enderror" 
                           type="text" 
                           name="username" 
                           placeholder="Username"
                           value="{{ old('username') }}">

                    <div class="relative">
                        <input id="js-pass" 
                               class="p-2 mt-2 rounded-xl border w-full @error('password') border-red-500 @enderror" 
                               type="password" 
                               name="password" 
                               placeholder="Password">
                        <button type="button" class="h-6 w-6 absolute right-3 top-4" onclick="passToggle()">
                            <svg id="js-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mt-2">
                        <select name="role" class="p-2 rounded-xl border w-full @error('role') border-red-500 @enderror">
                            <option value="">Pilih Role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-cyan-400 rounded-xl border mt-4 py-2 w-full hover:bg-cyan-500 transition">
                        Login
                    </button>

                    <div>
                        <p class="text-white text-sm mt-4 right-3">Belum Punya Akun? 
                            <a href="/register" class="underline">Register</a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Image -->
            <div class="w-full sm:w-1/2">
                <img class="rounded-2xl" src="{{ URL ('Image/examplejpg.jpg') }}" alt="Login Image">
            </div>
        </div>
    </section>

    <!--Script-->
    <script src="https://kit.fontawesome.com/cfcba85111.js" crossorigin="anonymous"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => alert.remove());
        }, 5000);

        const passInput = document.getElementById('js-pass');
        const eyeIcon = document.getElementById('js-eye');

        function passToggle() {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>'
            } else {
                passInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>'
            }  
        }
    </script>
</body>
</html>