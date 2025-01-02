<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="text-2xl font-bold mb-4">Daftar Pengaduan</strong>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-black">
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Lihat Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                @if ($complaint->user_id === auth()->user()->id)
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-2 px-4 border-b">{{ $complaint->user->name ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $complaint->title }}</td>
                                        <td class="py-2 px-4 border-b">{{ $complaint->status }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            <a href="{{ route('user.show', $complaint->id) }}" class="inline-block text-black font-semibold py-2 px-4 rounded">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
