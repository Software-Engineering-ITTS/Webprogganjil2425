@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-gray-900 text-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-extrabold mb-6">Tambah Event</h1>

        <form action="{{ route('event.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
             
                <div class="form-group">
                    <label for="name" class="block text-lg font-semibold text-gray-300">Nama Event</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

              
                <div class="form-group">
                    <label for="event_date" class="block text-lg font-semibold text-gray-300">Tanggal Event</label>
                    <input type="date" name="event_date" id="event_date" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

               
                <div class="form-group">
                    <label for="start_time" class="block text-lg font-semibold text-gray-300">Jam Mulai</label>
                    <input type="time" name="start_time" id="start_time" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="form-group">
                    <label for="end_time" class="block text-lg font-semibold text-gray-300">Jam Berakhir</label>
                    <input type="time" name="end_time" id="end_time" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

               
                <div class="form-group">
                    <label for="location" class="block text-lg font-semibold text-gray-300">Lokasi</label>
                    <input type="text" name="location" id="location" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

              
                <div class="form-group">
                    <label for="category" class="block text-lg font-semibold text-gray-300">Kategori</label>
                    <input type="text" name="category" id="category" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

              
                <div class="form-group">
                    <label for="max_participants" class="block text-lg font-semibold text-gray-300">Jumlah Peserta</label>
                    <input type="number" name="max_participants" id="max_participants" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

               
                <div class="form-group">
                    <label for="price" class="block text-lg font-semibold text-gray-300">Harga Tiket</label>
                    <input type="number" name="price" class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('price') }}" required>
                </div>

            
                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Buat Event
                </button>
            </div>
        </form>
    </div>
@endsection
