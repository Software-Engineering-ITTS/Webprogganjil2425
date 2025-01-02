@extends('layouts.User')

@section('content')
<div class="container mx-auto p-6 bg-gray-900 text-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Pendaftaran Event</h1>

    @if(session('success'))
        <div class="alert alert-success bg-green-600 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

       
        <div class="mb-4">
            <label for="name" class="form-label text-lg">Nama Lengkap</label>
            <input type="text" class="form-control w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500 @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-4">
            <label class="form-label text-lg">Jenis Kelamin</label>
            <select name="gender" class="form-control w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500 @error('gender') is-invalid @enderror" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="phone" class="form-label text-lg">Nomor Telepon</label>
            <input type="text" class="form-control w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500 @error('phone') is-invalid @enderror" name="phone" required value="{{ old('phone') }}">
            @error('phone')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-4">
            <label for="email" class="form-label text-lg">Email</label>
            <input type="email" class="form-control w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500 @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="event_id" class="form-label text-lg">Pilih Event</label>
            <select name="event_id" id="event_id" class="form-control w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-blue-500 @error('event_id') is-invalid @enderror" required>
                <option value="">Pilih Event</option>
                @foreach($events as $event)
                <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
    {{ $event->name }} ({{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}) - Rp 
    {{ number_format($event->price, 3) }}
</option>

                @endforeach
            </select>
            @error('event_id')
                <div class="text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-300">
            Daftar
        </button>
    </form>
</div>
@endsection
