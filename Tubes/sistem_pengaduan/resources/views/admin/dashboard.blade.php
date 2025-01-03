<x-app-layout>
    <div class="bg-white p-8 overflow-auto mt-8 h-screen">
        <h1 class="text-2xl mb-4 text-center">Daftar Pengaduan</h1>
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
                            <span class="block py-2 px-3 border-r border-gray-300">Lihat Detail</span>
                        </th>
                        <th class="p-0">
                            <span class="block py-2 px-3 border-r border-gray-300">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $complaint)
                        <tr class="hover:bg-gray-100 text-center">
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
    </div>
</x-app-layout>
