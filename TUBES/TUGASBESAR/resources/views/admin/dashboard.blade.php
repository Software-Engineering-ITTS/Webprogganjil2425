@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-extrabold text-white">Sistem Manajemen Event</h1>
        <p class="text-lg text-gray-400 mt-2">Kelola dan pantau acara dengan mudah melalui sistem ini.</p>

        <a href="{{ route('event.create') }}" class="mt-6 inline-block px-6 py-3 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200">
            <span class="font-semibold">Buat Event Baru</span>
        </a>
        
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-white">Daftar Event</h2>

            @if(session('success'))
                <div class="alert alert-success mt-4 bg-green-600 text-white p-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full mt-6 text-white bg-gray-800 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nama Event</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Waktu Mulai</th>
                        <th class="px-4 py-2 text-left">Waktu Selesai</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Max Peserta</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr class="bg-gray-700 hover:bg-gray-600">
                            <td class="px-4 py-2">{{ $event->name }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</td>
                            <td class="px-4 py-2">{{ $event->location }}</td>
                            <td class="px-4 py-2">{{ $event->category }}</td>
                            <td class="px-4 py-2">{{ $event->max_participants }}</td>
                            <td class="px-4 py-2">{{ number_format($event->price, 3) }}</td>
                            <td class="px-4 py-2 space-x-2">
    <div class="flex space-x-2">
        <a href="{{ route('event.participants', ['eventId' => $event->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
            Lihat Peserta
        </a>
        <a href="{{ route('event.edit', ['eventId' => $event->id]) }}" class="px-4 py-2 bg-dark-500 text-white rounded-md hover:bg-yellow-600 transition duration-200">
            Edit
        </a>
        <form action="{{ route('event.destroy', ['event' => $event->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                Hapus
            </button>
        </form>
    </div>
</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-gray-400 py-4">Belum ada event yang dibuat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
