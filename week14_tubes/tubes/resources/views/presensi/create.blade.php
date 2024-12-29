@extends('layouts.app')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center gap-10">
        <h1 class="text-3xl mt-10 font-bold">Presensi</h1>
        <form method="POST" action="/submit" class="flex bg-white px-10 py-5 flex-col gap-5">
            @csrf
            <div class="flex flex-col justify-center gap-3  ">
                <label class="font-medium text-sm" for="">Masukkan Tanggal : </label>
                <input class="bg-blue-500 py-1 rounded text-white px-20"   type="date" name="tanggal" id="tanggal" placeholder="input tanggal" required>
            </div>
            <div class="flex flex-col justify-center gap-3  ">
                <label class="font-medium text-sm" for="">Jam Masuk : </label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_masuk" id="jam_masuk" placeholder="input tanggal" required>
            </div>
            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="">Jam Keluar : </label>
                <input class="px-22 text-center bg-blue-500 py-1 rounded text-white" type="time" name="jam_keluar" id="jam_keluar" placeholder="input tanggal" required>
            </div>
            {{-- <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="">Karyawan : </label>
                <select name="user_id" id="user_id" class="text-white py-1 text-center bg-blue-500 ">
                    @foreach ($user as $userdata)
                        <option class="bg-white hover:bg-blue-100" value="{{ $userdata->id }}">{{ $userdata->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="flex justify-center items-center bg-black rounded-lg  mt-6 py-1 hover:bg-white hover:border-black border hover:text-blue-500 duration-300 text-white">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
@endsection