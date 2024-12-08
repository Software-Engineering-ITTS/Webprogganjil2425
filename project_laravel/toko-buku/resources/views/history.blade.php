@include('sidebar')

<body class="bg-gray-100 text-gray-800 ml-64 p-6">
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-bold mt-4">List Transaksi</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead class="bg-gray-200 uppercase">
                <tr>
                    <th class="border p-4">judul</th>
                    <th class="border p-4">nama customer</th>
                    <th class="border p-4">nomor telepon</th>
                    <th class="border p-4">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="text-center odd:bg-white even:bg-gray-100">
                    <td class="border p-4">{{ $items->judul }}</td>
                    <td class="border p-4">{{ $items->nama }}</td>
                    <td class="border p-4">{{ $items->telepon }}</td>
                    <td class="border p-4">{{ $items->status }}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>