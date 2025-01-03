<x-app-layout>
    <div class="bg-white p-8 overflow-auto mt-8 h-screen">
        <h1 class="text-2xl mb-4 text-center">Laporan Pengaduan</h1>
        <div class="relative overflow-auto">
            <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border mb-20">
            <thead>
                <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
                    <th class="p-0">
                        <span class="block py-2 px-3 border-r border-gray-300">Username</span>
                    </th>
                    <th class="p-0">
                        <span class="block py-2 px-3 border-r border-gray-300">Title</span>
                    </th>
                    <th class="p-0">
                        <span class="block py-2 px-3 border-r border-gray-300">Date</span>
                    </th>
                    <th class="p-0">
                        <span class="block py-2 px-3 border-r border-gray-300">Status</span>
                    </th>
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
    </div>
    </div>
</x-app-layout>