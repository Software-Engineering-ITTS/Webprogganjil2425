<x-app-layout>
    <div class="py-6 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="text-2xl font-bold mb-4">Detail Pengaduan</strong>
                    <p><strong>Name:</strong> {{ $complaint->user->name ?? 'N/A' }}</p>
                    <p><strong>Title:</strong> {{ $complaint->title }}</p>
                    <p><strong>Date:</strong> {{ $complaint->created_at->format('d/m/Y') }}</p>
                    <p><strong>Description:</strong> {{ $complaint->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>