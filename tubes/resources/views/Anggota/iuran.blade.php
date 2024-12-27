<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="iuran-form"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-screen items-center justify-center">
        <div class="border rounded-lg">
            <div class="border-b p-5 flex justify-between items-center bg-white">
                <h2 class="font-medium text-2xl">Iuran</h2>
                <button type="button" id="iuran-form"
                    class="bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm"
                    data-modal-toggle="iuran-form">
                    <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="p-20 bg-white">
                <form action="{{ route('join', $items->id) }}" method="POST">
                    @csrf
                    <div class="mb-2 space-y-3">
                        <label for="iuran" class="font-semibold text-xl block">Seikhlasnya</label>
                        <input type="text" name="iuran" id="iuran" class="rounded-lg w-full" placeholder="5000"
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
</body>

</html>
