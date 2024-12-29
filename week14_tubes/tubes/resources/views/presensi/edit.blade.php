@extends('layouts.app')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center gap-10">
        <h1 class="text-3xl mt-10 font-bold">Edit Presensi</h1>
        <form method="POST" action="{{ route('admin.presensi.update', $presensi->id) }}" class="flex bg-white px-10 py-5 flex-col gap-5">
            @csrf
            @method('PUT')

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="tanggal">Tanggal:</label>
                <input class="bg-blue-500 py-1 rounded text-white px-20" type="date" name="tanggal" id="tanggal" value="{{ $presensi->tanggal }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="jam_masuk">Jam Masuk:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_masuk" id="jam_masuk" value="{{ $presensi->jam_masuk }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="jam_keluar">Jam Keluar:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_keluar" id="jam_keluar" value="{{ $presensi->jam_keluar }}">
            </div>

            <input type="hidden" name="user_id" value="{{ $presensi->user_id }}">

            <div class="flex justify-center items-center bg-black rounded-lg mt-6 py-1 hover:bg-white hover:border-black border hover:text-blue-500 duration-300 text-white">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
@endsection
