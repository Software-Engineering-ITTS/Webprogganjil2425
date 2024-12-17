@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembayaran Tagihan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 bg-white w-64 shadow-lg">
            <div class="flex flex-col h-full">
                <div class="h-16 flex items-center justify-center border-b">
                    <h1 class="text-xl font-bold text-gray-800">Sistem Tagihan</h1>
                </div>
                <nav class="flex-1 p-4">
                    <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('customers.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('customers.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                        Customers
                    </a>
                    <a href="{{ route('invoices.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('invoices.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                        Invoices
                    </a>
                    <a href="{{ route('payments.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('payments.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                        Payments
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 p-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>