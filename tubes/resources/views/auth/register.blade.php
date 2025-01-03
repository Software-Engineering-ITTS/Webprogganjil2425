<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-gradient-to-br from-green-400 to-blue-600">
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="w-3/5 space-y-2 border rounded-lg bg-white">
                <h1 class="m-5 font-bold text-3xl">Daftar Langsung !</h1>
                <div class="pb-10">
                    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-3">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 m-10">
                            <div>
                                <label for="" class="block font-medium">Username</label>
                                <input type="text" name="username" id="username"
                                    class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                    placeholder="Username" required>
                            </div>

                            <div>
                                <label for="" class="block font-medium">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                    required>
                            </div>

                            <div>
                                <label for="gender" class="block font-medium">Gender</label>
                                <div class="p-4">
                                    <input type="radio" name="gender" id="gender" value="Laki - Laki"
                                        class="p-2">
                                    <label for="" class="me-3">Laki - Laki</label>
                                    <input type="radio" name="gender" id="gender" value="Perempuan"
                                        class="p-2">
                                    <label for="">Perempuan</label>
                                </div>
                            </div>

                            <div>
                                <label for="" class="block font-medium">Telepon</label>
                                <input type="text" name="telepon" id="telepon"
                                    class="w-full p-2 mt-1 rounded-lg border hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                    placeholder="08xx" required>
                            </div>

                            <div>
                                <label for="" class="block font-medium">Email</label>
                                <input type="email" name="email" id="email"
                                    class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                    placeholder="name@example.com" required>
                            </div>

                            <div>
                                <label for="" class="block font-medium">Password</label>
                                <input type="password" name="password" id="password"
                                    class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                    placeholder="Password" required min="8">
                            </div>
                        </div>

                        <div class="p-4">
                            <label for="image" class="block font-medium ml-6">Avatar</label>
                            <input type="file" name="image" id="image"
                                class="w-[96%] mt-1 ml-5 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="p-4 text-center">
                            <div class="m-5">
                                <input type="checkbox" class="w-4 h-4 mx-2" required>
                                <label for="">Saya menerima <a href=""
                                        class="text-blue-500 font-medium hover:underline">Syarat dan
                                        Ketentuan</a></label>
                            </div>
                            <div class="m-5 py-2">
                                <button type="submit"
                                    class="font-medium bg-blue-700 text-white w-2/5 rounded-lg p-2 text-center">Create
                                    Akun</button>
                            </div>
                            <div class="m-5">
                                <p class="font-medium">Sudah punya akun ? <a href="{{ url('login') }}"
                                        class="font-medium text-blue-700 hover:underline">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
</body>

</html>
