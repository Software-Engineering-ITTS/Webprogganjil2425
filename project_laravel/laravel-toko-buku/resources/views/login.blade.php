<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <section>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="mb-3">
                <a href="{{url('/')}}" class="flex items-center">
                    <img class="w-16 h-16"
                        src="https://png.pngtree.com/png-clipart/20220909/original/pngtree-books-vectro-illustration-png-image_8522264.png"
                        alt="">
                    <span class="font-bold text-4xl">BokoBoy</span>
                </a>
            </div>

            <div class="w-full space-y-2 sm:max-w-md md:mt-0 xl:p-0 border rounded-lg">
                <h1 class="ml-5 mt-3 font-bold text-3xl">Loginkan Bang...</h1>
                <div class="pb-10">
                    <form action="" class="space-y-3">
                        <div class="m-5">
                            <label for="" class="block font-medium">Username</label>
                            <input type="text" class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="Username"
                                required>
                        </div>
                        <div class="m-5">
                            <label for="" class="block font-medium">Password</label>
                            <input type="Password" class="w-full p-2 mt-1 border rounded-lg hover:ring-2 hover:ring-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="Password"
                                required>
                        </div>
                        <div class="m-5">
                            <a href=""class="text-sm font-medium text-blue-700 hover:underline">Forgot Password
                                ?</a>
                        </div>
                        <div class="m-5 py-2">
                            <button type="submit"
                                class="font-medium bg-blue-700 text-white w-full rounded-lg p-2 text-center">Login</button>
                        </div>
                        <div class="m-5">
                            <p class="font-medium">Belum punya akun ? <a href="{{url('/signup')}}"
                                    class="font-medium text-blue-700 hover:underline">Daftar
                                    Sekarang</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
