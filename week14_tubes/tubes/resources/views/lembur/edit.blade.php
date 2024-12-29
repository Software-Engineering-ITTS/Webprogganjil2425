@extends('layouts.app')

@section('content')

<body>
    <div class="flex flex-col justify-center items-center gap-10">
        <h1 class="text-3xl mt-10 font-bold">Edit Lembur</h1>
        <form method="POST" action="{{ route('admin.lembur.update', $lembur->id) }}" class="flex bg-white px-10 py-5 flex-col gap-5">
            @csrf
            @method('PUT')

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="tanggal">Tanggal:</label>
                <input class="bg-blue-500 py-1 rounded text-white px-20" type="date" name="tanggal" id="tanggal" value="{{ $lembur->tanggal }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="jam_mulai">Jam Mulai:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_mulai" id="jam_mulai" value="{{ $lembur->jam_mulai }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="jam_selesai">Jam Selesai:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_selesai" id="jam_selesai" value="{{ $lembur->jam_selesai }}">
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="keterangan">Keterangan:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="text" name="keterangan" id="keterangan" value="{{ $lembur->keterangan }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="status">Status Izin:</label>
                <select class="text-center bg-blue-500 py-1 rounded text-white" name="status" id="status" required>
                    @foreach (['pending', 'approved', 'declined'] as $status)
                    <option value="{{ $status }}" {{ $lembur->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{ $lembur->user_id }}">

            <div class="flex justify-center items-center bg-black rounded-lg mt-6 py-1 hover:bg-white hover:border-black border hover:text-blue-500 duration-300 text-white">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
    @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

</body>
@endsection