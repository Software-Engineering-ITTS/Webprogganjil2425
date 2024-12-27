@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="flex justify-center items-center space-x-36 h-[80vh]">
        <div class="border rounded-lg w-96 h-72 flex justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-3xl text-white">{{ $users }} Anggota</h1>
        </div>
        <div class="border rounded-lg w-96 h-72 flex justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-3xl text-white">{{ $kegiatans }} Kegiatan</h1>
        </div>
        <div class="border rounded-lg w-96 h-72 flex justify-center items-center bg-teal-600">
            <h1 class="font-semibold text-3xl text-white">Total Iuran Rp. {{ $iuran }}</h1>
        </div>
    </div>
</main>
