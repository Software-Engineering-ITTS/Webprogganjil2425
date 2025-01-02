@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-gray-900 text-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-extrabold mb-6">Peserta Event: {{ $event->name }}</h1>

        <table class="w-full bg-gray-800 text-white rounded-lg shadow-md">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Peserta</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Nomor HP</th>
                    <th class="px-6 py-3 text-left">Status Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($event->participants as $participant)
                    <tr class="bg-gray-700 hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $participant->name }}</td>
                        <td class="px-6 py-4">{{ $participant->email }}</td>
                        <td class="px-6 py-4">{{ $participant->phone }}</td>
                        <td class="px-6 py-4">{{ $participant->status ?? 'Success' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-400 py-4">Belum ada peserta terdaftar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
