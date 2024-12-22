@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div>
        <h3 class="text-lg font-bold">List Data Anggota</h3>
    </div>
    <table class="mt-5 table-auto w-full text-base">
        <thead class="border border-black">
            <tr class="uppercase">
                <th class="p-3 border-r-2 border-black">Username</th>
                <th class="p-3 border-r-2 border-black w-48">Tanggal Lahir</th>
                <th class="p-3 border-r-2 border-black">Gender</th>
                <th class="p-3 border-r-2 border-black">Telepon</th>
                <th class="p-3 border-r-2 border-black">Email</th>
                <th class="p-3">Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
                <tr class="border border-black text-center">
                    <td class="p-3 border-r-2 border-black">{{ $data->username }}</td>
                    <td class="p-3 border-r-2 border-black">{{ $data->tanggal_lahir }}</td>
                    <td class="p-3 border-r-2 border-black">{{ $data->gender }}</td>
                    <td class="p-3 border-r-2 border-black">{{ $data->telepon }}</td>
                    <td class="p-3 border-r-2 border-black">{{ $data->email }}</td>
                    <td class="p-3">{{ $data->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
