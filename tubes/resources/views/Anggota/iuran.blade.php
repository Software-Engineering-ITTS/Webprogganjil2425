<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iuran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="h-screen flex items-center justify-center">
        <div class="border rounded-lg w-80">
            <div class="border-b-2 p-5 flex justify-between items-center bg-white">
                <h2 class="font-medium text-2xl">Iuran</h2>
                <a href="{{url('/')}}"><svg class="w-[36px] h-[36px] text-purple-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M14.5 3 12 7.156 9.857 3H2l10 18L22 3h-7.5ZM4.486 4.5h2.4L12 13.8l5.107-9.3h2.4L12 18.021 4.486 4.5Z" />
                    </svg></a>
            </div>
            <div class="p-20 bg-white">
                <form action="{{ route('join', $kegiatans->id) }}" method="POST">
                    @csrf
                    <div class="mb-2 space-y-3">
                        <label for="iuran" class="font-semibold text-xl block">Seikhlasnya</label>
                        <input type="number" name="iuran" id="iuran" class="rounded-lg w-full" placeholder="5000"
                            required min="5000">
                    </div>
                    <button type="submit"
                        class="p-2 font-medium text-base border rounded-lg bg-teal-300 items-center hover:text-white">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
