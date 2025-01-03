<x-app-layout>
    <div class="bg-white p-8 overflow-auto mt-8 h-screen">
        <h1 class="text-2xl mb-4 text-center">Daftar Tanggapan</h1>
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
                                    <span class="block py-2 px-3 border-r border-gray-300">Status</span>
                                </th>
                                <th class="p-0">
                                    <span class="block py-2 px-3 border-r border-gray-300">Lihat Detail</span>
                                </th>
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
</x-app-layout>
