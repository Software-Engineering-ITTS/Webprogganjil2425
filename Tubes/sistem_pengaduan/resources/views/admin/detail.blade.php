<x-app-layout>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Detail Pengaduan</h1>
        <p><strong>Username:</strong> {{ $complaint->user->name ?? 'N/A' }}</p>
        <p><strong>Title:</strong> {{ $complaint->title }}</p>
        <p><strong>Date:</strong> {{ $complaint->created_at->format('d/m/Y') }}</p>
        <p><strong>Description:</strong> {{ $complaint->description }}</p>
        @if($complaint->file_path)
            <h2 class="mt-6 text-xl font-semibold">File Uploaded</h2>
            <a href="{{ Storage::url($complaint->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                Download File
            </a>
        @else
            <p class="mt-4 text-red-600">No file.</p>
        @endif
    </div>
</x-app-layout>
