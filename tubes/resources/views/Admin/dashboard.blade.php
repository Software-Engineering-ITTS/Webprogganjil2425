@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="flex justify-center items-center space-x-36 h-[80vh]">
        <div class="border rounded-lg w-96 h-72 flex flex-col justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-[100px] text-white">{{ $users }}</h1>
            <h1 class="font-semibold text-3xl text-white">Anggota</h1>
        </div>
        <div class="border rounded-lg w-96 h-72 flex flex-col justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-[100px] text-white">{{ $kegiatans }}</h1>
            <h1 class="font-semibold text-3xl text-white">Kegiatan</h1>
        </div>
        <div class="border rounded-lg w-96 h-72 flex flex-col justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-[70px] text-white">Rp. {{ $iuran }}</h1>
        </div>
    </div>
</main>
