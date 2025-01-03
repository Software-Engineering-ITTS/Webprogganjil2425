@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="mb-10 mt-5">
        <h3 class="text-3xl font-bold text-center uppercase">List Data Anggota</h3>
    </div>
    <form action="{{ route('search.anggota') }}" method="GET">
        <div class="flex relative w-fit">
            <input type="text" name="search" id="search"
                class="rounded-full text-sm w-56 hover:ring-blue-500 hover:ring-1" placeholder="Search...">
            <div class="absolute left-[180px]">
                <button class="p-2" type="submit"><img class="w-5"
                        src="https://img.icons8.com/?size=100&id=132&format=png&color=000000" alt=""></button>
            </div>
        </div>
    </form>

    @if ($users->isEmpty())
        <p class="text-center text-red-500 mt-5">Tidak ada data ditemukan.</p>
    @else
        <table class="mt-5 table-auto w-full text-base">
            <thead class="border-b-2">
                <tr class="uppercase text-sm">
                    <th class="p-3">Aksi</th>
                    <th class="p-3">Avatar</th>
                    <th class="p-3">Username</th>
                    <th class="p-3 w-48">Tanggal Lahir</th>
                    <th class="p-3">Gender</th>
                    <th class="p-3">Telepon</th>
                    <th class="p-3">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr class="text-center border-b odd:bg-white even:bg-gray-100">
                        <td class="p-5">
                            <a href="/dashboard/data-anggota/infokegiatan{{ $data->id }}"
                                class="py-2 px-4 border rounded-full bg-green-500 text-white font-semibold hover:bg-green-700">i</a>
                        </td>
                        <td class="p-5 flex justify-center items-center">
                            <img src="{{ Storage::url($data->image) }}" alt="" class="w-20 h-20">
                        </td>
                        <td class="p-5">{{ $data->username }}</td>
                        <td class="p-5">{{ $data->tanggal_lahir }}</td>
                        <td class="p-5">{{ $data->gender }}</td>
                        <td class="p-5">{{ $data->telepon }}</td>
                        <td class="p-5">{{ $data->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            <div class="text-center">
                <p>{{ $users->firstItem() }} of {{ $users->total() }}</p>
            </div>
            <div class="relative bottom-8">
                {!! $users->links() !!}
            </div>
        </div>
    @endif
</main>
