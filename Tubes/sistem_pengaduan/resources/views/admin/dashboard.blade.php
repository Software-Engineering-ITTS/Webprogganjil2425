<x-app-layout>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Daftar Pengaduan</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-3 px-4 border-b text-left font-bold">Username</th>
                        <th class="py-3 px-4 border-b text-left font-bold">Title</th>
                        <th class="py-3 px-4 border-b text-left font-bold">Date</th>
                        <th class="py-3 px-4 border-b text-left font-bold">Lihat Detail</th>
                        <th class="py-3 px-4 border-b text-left font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $complaint)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b font-semibold">{{ $complaint->user->name ?? 'N/A' }}</td>
                            <td class="py-2 px-4 border-b font-semibold">{{ $complaint->title }}</td>
                            <td class="py-2 px-4 border-b font-semibold">{{ $complaint->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <a href="{{ route('admin.detail', $complaint->id) }}" class="inline-block text-black font-semibold py-2 px-4 rounded">View</a>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('admin.detail.updateStatus', $complaint->id) }}" method="POST" class="inline">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="ml-2 border border-gray-300 rounded-md">
                                        <option value="new" {{ $complaint->status == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="proses" {{ $complaint->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="ditolak" {{ $complaint->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
