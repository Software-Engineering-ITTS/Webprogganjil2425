@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8 bg-gray-900 text-white rounded-lg shadow-lg">
    <h1 class="text-4xl font-extrabold mb-6">Edit Event</h1>

    @if(session('success'))
        <div class="alert alert-success mb-4 p-4 bg-green-600 text-white rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('event.update', ['eventId' => $event->id]) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-4">
            <label for="name" class="form-label block text-lg font-medium">Nama Event</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="name" name="name" value="{{ old('name', $event->name) }}" required>
            @error('name')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="event_date" class="form-label block text-lg font-medium">Tanggal Event</label>
            <input type="date" class="form-control @error('event_date') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date) }}" required>
            @error('event_date')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="start_time" class="form-label block text-lg font-medium">Waktu Mulai</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="start_time" name="start_time" value="{{ old('start_time', $event->start_time) }}" required>
            @error('start_time')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="end_time" class="form-label block text-lg font-medium">Waktu Selesai</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="end_time" name="end_time" value="{{ old('end_time', $event->end_time) }}" required>
            @error('end_time')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="location" class="form-label block text-lg font-medium">Lokasi</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="location" name="location" value="{{ old('location', $event->location) }}" required>
            @error('location')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="form-label block text-lg font-medium">Kategori</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="category" name="category" value="{{ old('category', $event->category) }}" required>
            @error('category')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="max_participants" class="form-label block text-lg font-medium">Max Peserta</label>
            <input type="number" class="form-control @error('max_participants') is-invalid @enderror w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" id="max_participants" name="max_participants" value="{{ old('max_participants', $event->max_participants) }}" required>
            @error('max_participants')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label block text-lg font-medium">Harga Tiket</label>
            <input type="number" step="0.01" class="form-control w-full px-4 py-2 bg-gray-800 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="price" value="{{ old('price', $event->price) }}" required>
        </div>

        <button type="submit" class="btn bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Perbarui Event</button>
    </form>
</div>
@endsection
