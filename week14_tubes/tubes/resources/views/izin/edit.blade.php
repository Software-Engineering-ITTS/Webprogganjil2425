@extends('layouts.app')

@section('content')

<body>
    <div class="flex flex-col justify-center items-center gap-10">
        <h1 class="text-3xl mt-10 font-bold">Edit Izin</h1>
        <form method="POST" action="{{ route('admin.izin.update', $izin->id) }}" class="flex bg-white px-10 py-5 flex-col gap-5">
            @csrf
            @method('PUT')

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="jenis_izin">Jenis Izin:</label>
                <select class="text-center bg-blue-500 py-1 rounded text-white" name="jenis_izin" id="jenis_izin" required>
                    @foreach (['sakit', 'cuti', 'lainnya'] as $jenis)
                    <option value="{{ $jenis }}" {{ $izin->jenis_izin === $jenis ? 'selected' : '' }}>
                        {{ ucfirst($jenis) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="tanggal_mulai">Tanggal Mulai Cuti:</label>
                <input class="bg-blue-500 py-1 rounded text-white px-20" type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $izin->tanggal_mulai }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="tanggal_selesai">Tanggal Selesai Cuti:</label>
                <input class="bg-blue-500 py-1 rounded text-white px-20" type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ $izin->tanggal_selesai }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="alasan">Alasan Cuti:</label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="text" name="alasan" id="alasan" value="{{ $izin->alasan }}" required>
            </div>

            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="status">Status Izin:</label>
                <select class="text-center bg-blue-500 py-1 rounded text-white" name="status" id="status" required>
                    @foreach (['pending', 'approved', 'declined'] as $status)
                    <option value="{{ $status }}" {{ $izin->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{ $izin->user_id }}">

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