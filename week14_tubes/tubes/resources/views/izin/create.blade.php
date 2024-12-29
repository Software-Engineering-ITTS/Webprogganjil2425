@extends('layouts.app')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center gap-10">
        <h1 class="text-3xl mt-10 font-bold">Izin</h1>
        <form method="POST" action="/submitizin" class="flex bg-white px-10 py-5 flex-col gap-5">
            @csrf
            <div class="flex flex-col justify-center gap-3  ">
                <label class="font-medium text-sm items-center" for="">Jenis Cuti : </label>
                <select class=" text-center   bg-blue-500 py-1 rounded text-white" name="jenis_izin" id="jenis_izin" required>
                    <option  value="sakit">Sakit</option>
                    <option  value="cuti" >Cuti</option>
                    <option  value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="flex flex-col justify-center gap-3  ">
                <label class="font-medium text-sm" for="">Tanggal Mulai Cuti : </label>
                <input class="px-16 text-center bg-blue-500 py-1 rounded text-white" type="date" name="tanggal_mulai" id="tanggal_mulai" placeholder="input tanggal" required>
            </div>
            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="">Tanggal Selesai Cuti : </label>
                <input class="px-16 text-center bg-blue-500 py-1 rounded text-white" type="date" name="tanggal_selesai" id="tanggal_selesai" placeholder="input tanggal" required>
            </div>
            <div class="flex flex-col justify-center gap-3">
                <label class="font-medium text-sm" for="">Alasan : </label>
                <input class="px-16 text-center bg-blue-500 py-1 rounded text-white" type="text" name="alasan" id="alasan" placeholder="input alasan" required>
            </div>
         
            <input type="hidden" name="status" value="pending">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="flex justify-center items-center bg-black rounded-lg  mt-6 py-1 hover:bg-white hover:border-black border hover:text-blue-500 duration-300 text-white">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
@endsection