<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-gradient-to-br from-green-400 to-blue-600">
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="w-full space-y-2 sm:max-w-md md:mt-0 xl:p-0 border rounded-lg bg-white">
                <div class="p-4 space-x-1 flex justify-center items-center">
                    <a href="{{url('/')}}"><svg class="w-[40px] h-[40px] text-teal-400 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                clip-rule="evenodd" />
                        </svg></a>
                    <h1 class="font-bold text-3xl text-center">Login</h1>
                </div>
                <div class="pb-10">
                    <form action="{{ route('login.post') }}" method="POST" class="space-y-3">
                        @csrf
                        <div class="m-5">
                            <label for="username" class="block font-medium">Username</label>
                            <input type="text" name="username" id="username"
                                class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                placeholder="Username" required>
                        </div>
                        <div class="m-5">
                            <label for="password" class="block font-medium">Password</label>
                            <input type="password" name="password"
                                class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500"
                                placeholder="Password" required>
                        </div>
                        <div class="m-5 py-2">
                            <button type="submit"
                                class="font-medium bg-blue-700 text-white w-full rounded-lg p-2 text-center">Login</button>
                        </div>
                        <div class="m-5">
                            <p class="font-medium">Belum punya akun ? <a href="{{ url('register') }}"
                                    class="font-medium text-blue-700 hover:underline">Daftar
                                    Sekarang</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
</body>

</html>
