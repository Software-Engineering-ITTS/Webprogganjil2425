@include('layouts.sidebar')

<main class="ml-64 p-6">
    <div class="mb-10 mt-5">
        <h3 class="text-3xl font-bold text-center uppercase">List Data Anggota</h3>
    </div>
    <table class="mt-5 table-auto border-collapse border w-full text-base">
        <thead class="">
            <tr class="uppercase">
                <th class="p-3">Aksi</th>
                <th class="p-3">Username</th>
                <th class="p-3 w-48">Tanggal Lahir</th>
                <th class="p-3">Gender</th>
                <th class="p-3">Telepon</th>
                <th class="p-3">Email</th>
                <th class="p-3">Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
                <tr class="border border-black text-center odd:bg-white even:bg-gray-100">
                    <td class="p-5">
                        <a href="" class="py-2 px-4 border rounded-full bg-green-500 text-white font-semibold hover:bg-green-700">i</a>
                    </td>
                    <td class="p-5">{{ $data->username }}</td>
                    <td class="p-5">{{ $data->tanggal_lahir }}</td>
                    <td class="p-5">{{ $data->gender }}</td>
                    <td class="p-5">{{ $data->telepon }}</td>
                    <td class="p-5">{{ $data->email }}</td>
                    <td class="p-5">{{ $data->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
