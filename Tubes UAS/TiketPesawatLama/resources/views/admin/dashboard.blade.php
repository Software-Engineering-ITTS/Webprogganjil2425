<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50">

    <div class="container mx-auto p-10">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Selamat Datang Admin</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class="block text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path></svg>
                        Daftar Tiket
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tickets.create') }}" class="block text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path></svg>
                        Buat Tiket Baru
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.transactions') }}" class="block text-lg font-medium text-green-600 hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3z"></path></svg>
                        Riwayat Pemesanan
                    </a>
                </li>
            </ul>
        </div>

        <form action="{{ url('admin/logout') }}" method="POST" class="mt-8 text-center">
            @csrf
            <button type="submit" class="py-3 px-8 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300 text-lg">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
