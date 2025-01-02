@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')
<a href="{{ route('kegiatans.index') }}" class="relative flex bg-teal-500 px-5 py-2 w-44 rounded-lg text-white mt-10 ml-10">Kembali ke Home</a>
<section class="container pl-44 mt-10">
    <h1 class="text-2xl font-bold">Tambah Kegiatan</h1>
    <form action="{{ route('kegiatans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        
        <div>
            <label for="nama_kegiatan" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Nama Kegiatan
                </span>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="mt-1 px-9 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Kegiatan" required />
            </label>
        </div>

        <div>
            <label for="penanggung_jawab" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Penanggung Jawab
                </span>
                <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="mt-1 px-9 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Penanggung Jawab" required />
            </label>
        </div>

        <div>
            <label for="waktu_mulai" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Waktu Mulai
                </span>
                <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" required />
            </label>
        </div>

        <div>
            <label for="waktu_selesai" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Waktu Selesai
                </span>
                <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" required />
            </label>
        </div>

        <div>
            <label for="ruangan_id" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Ruangan
                </span>
                <select name="ruangan_id" id="ruangan_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 block rounded-md sm:text-sm focus:ring-1 w-96" required>
                    <option value="" disabled selected>Pilih Ruangan</option>
                    @foreach ($ruangans as $ruangan)
                        <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div>
            <label for="aktivitas_mencurigakan" class="block">
                <span class="block text-sm font-medium text-slate-700">
                    Aktivitas Mencurigakan
                </span>
                <input type="checkbox" name="aktivitas_mencurigakan" id="aktivitas_mencurigakan" value="1" class="mt-1">
                <span class="text-sm text-slate-500">Centang jika aktivitas mencurigakan</span>
            </label>
        </div>

        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</section>
@endsection
