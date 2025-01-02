<nav class="bg-gray-200 p-4 text-dark font-semibold">
    <div class="container mx-auto flex justify-end gap-5">
    <a href="{{ route('ruangans.index') }}" class="font-serif font-normal hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out py-2 px-2 rounded-full">Manage Ruangan</a>
    <a href="{{ route('ijinMasuks.index') }}" class="font-serif font-normal hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out py-2 px-2 rounded-full">Pengajuan Ijin Masuk</a>
    <a href="{{ route('kegiatans.index') }}" class="font-serif font-normal hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out py-2 px-2 rounded-full">Kegiatan</a>

    @if(auth()->check() && auth()->user()->username === 'admin')
            <a href="{{ route('ijinMasuks.approval') }}" class="font-serif font-normal hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out  py-2 px-2 rounded-full">Approve Ijin Masuk</a>
    @endif
    </div>
</nav>
