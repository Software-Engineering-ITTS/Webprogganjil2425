<x-app-layout>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Laporan Pengaduan</h1>
        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Username</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                    <tr>
                        <td class="border px-4 py-2">{{ $complaint->user->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $complaint->title }}</td>
                        <td class="border px-4 py-2">{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">
                            @if($complaint->status == 'selesai')
                                <span class="text-green-600 font-semibold">{{ ucfirst($complaint->status) }}</span>
                            @elseif($complaint->status == 'ditolak')
                                <span class="text-red-600 font-semibold">{{ ucfirst($complaint->status) }}</span>
                            @else
                                <span class="text-gray-600 font-semibold">{{ ucfirst($complaint->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>