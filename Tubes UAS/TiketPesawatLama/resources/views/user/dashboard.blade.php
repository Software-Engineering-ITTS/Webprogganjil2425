<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50">
    <div class="flex min-h-screen">

        <div class="w-1/4 bg-green-100 p-6 shadow-lg">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">SansFly!</h1>

            <ul class="space-y-6">
                <li>
                    <a href="{{ route('user.tickets.index') }}" class="block text-lg font-medium hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                        List Tiket
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.tickets.history') }}" class="block text-lg font-medium hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3z"></path>
                        </svg>
                        Riwayat Pemesanan
                    </a>
                </li>

                <li>
                    @if(Auth::user()->latestOrder)
                    <a href="{{ route('user.view-ticket', ['orderId' => Auth::user()->latestOrder->id]) }}" class="block text-lg font-medium hover:text-green-800 transition duration-300">
                        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                        Lihat Tiket yang Dipesan
                    </a>
                    @else
                    <span class="block text-gray-500 py-2 px-4">Anda belum memiliki tiket yang dipesan</span>
                    @endif
                </li>
            </ul>

            <form action="{{ route('user.logout') }}" method="POST" class="mt-6 text-center">
                @csrf
                <button type="submit" class="w-full py-3 px-8 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300 text-lg">
                    Logout
                </button>
            </form>
        </div>

        <div class="flex-1 p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <p class="text-lg text-gray-700 mb-4">Silahkan pilih menu yang ingin dituju!</p>
                <p class="text-gray-500 text-sm">Semoga penerbanganmu berjalan lancar</p>
            </div>
        </div>
    </div>
</body>
</html>
