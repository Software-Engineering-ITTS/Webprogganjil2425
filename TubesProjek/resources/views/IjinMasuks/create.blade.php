@extends('layouts.app')

@section('title', 'Ajukan Ijin Masuk')

@section('content')
<a href="{{ route('ijinMasuks.index') }}" class="relative flex bg-teal-500 px-5 py-2 w-44 rounded-lg text-white mt-10 ml-10">Kembali ke Home</a>
<section class="container pl-44 pt-7 mt-20">
    <h1 class="text-2xl font-bold">Ajukan Ijin Masuk</h1>
    <form action="{{ route('ijinMasuks.store') }}" method="POST" class="space-y-4">
        @csrf


        <div>
            <label for="ruangan_id" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Pilih Ruangan
                </span>
            </label>
            <select name="ruangan_id" id="ruangan_id" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 block rounded-md sm:text-sm focus:ring-1 w-96" required>
                <option value="" disabled selected>Pilih Ruangan</option>
                @foreach ($ruangans as $ruangan)
                <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="alasan" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Alasan Masuk
                </span>
            </label>
            <textarea name="alasan" id="alasan" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Alasan Masuk" required></textarea>
        </div>

        <div>
            <label for="waktu_ijin" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Waktu Ijin Masuk
                </span>
            </label>
            <input type="datetime-local" name="waktu_ijin" id="waktu_ijin" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 block rounded-md sm:text-sm focus:ring-1 w-96" required>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()-id() }}">
        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Ajukan</button>
    </form>
</section>
@endsection