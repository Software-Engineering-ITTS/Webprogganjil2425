@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pembayaran Tagihan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-100">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 bg-green w-64 shadow-lg">
            <div class="flex flex-col h-full">
                <div class="h-16 flex items-center justify-center border-b">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 8l-4 4h3c0 3.31-2.69 6-6 6c-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6c1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4l4-4H6z">
                            <animateTransform attributeName="transform" attributeType="XML" dur="5s" from="360 12 12" repeatCount="indefinite" to="0 12 12" type="rotate"/>
                        </path>
                    </svg> 
                <span class= "font-bold" style="margin-left: 8px;">Sistem Tagihan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 8l-4 4h3c0 3.31-2.69 6-6 6c-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6c1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4l4-4H6z">
                        <animateTransform attributeName="transform" attributeType="XML" dur="5s" from="360 12 12" repeatCount="indefinite" to="0 12 12" type="rotate"/>
                    </path>
                </svg>
                </div>
                <nav class="flex-1 p-4">
                    
                    <a href="{{ route('dashboard') }}" class="mt-2 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2">
                    <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6zm2-10h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2"/>
                    </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('customers.index') }}" class="mt-2 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('customers.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="inline-block w-5 h-5 mr-2">
                    <path fill="currentColor" d="M29.755 21.345A1 1 0 0 0 29 21h-2v-2c0-1.102-.897-2-2-2h-4c-1.103 0-2 .898-2 2v2h-2a1 1 0 0 0-.99 1.142l1 7A1 1 0 0 0 18 30h10a1 1 0 0 0 .99-.858l1-7a1 1 0 0 0-.235-.797M21 19h4v2h-4zm6.133 9h-8.266l-.714-5h9.694zM10 20h2v10h-2z"/>
                    <path fill="currentColor" d="m16.78 17.875l-1.906-2.384l-1.442-3.605A2.99 2.99 0 0 0 10.646 10H5c-1.654 0-3 1.346-3 3v7c0 1.103.897 2 2 2h1v8h2V20H4v-7a1 1 0 0 1 1-1h5.646c.411 0 .776.247.928.629l1.645 3.996l2 2.5zM4 5c0-2.206 1.794-4 4-4s4 1.794 4 4s-1.794 4-4 4s-4-1.794-4-4m2 0c0 1.103.897 2 2 2s2-.897 2-2s-.897-2-2-2s-2 .897-2 2"/>
                    </svg>
                        Customers
                    </a>
                    <a href="{{ route('invoices.index') }}" class="mt-2 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('invoices.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                    <path d="M20.016 2C18.903 2 18 4.686 18 8h2.016c.972 0 1.457 0 1.758-.335c.3-.336.248-.778.144-1.661C21.64 3.67 20.894 2 20.016 2"/>
                    <path d="M18 8.054v10.592c0 1.511 0 2.267-.462 2.565c-.755.486-1.922-.534-2.509-.904c-.485-.306-.727-.458-.996-.467c-.291-.01-.538.137-1.062.467l-1.911 1.205c-.516.325-.773.488-1.06.488s-.545-.163-1.06-.488l-1.91-1.205c-.486-.306-.728-.458-.997-.467c-.291-.01-.538.137-1.062.467c-.587.37-1.754 1.39-2.51.904C2 20.913 2 20.158 2 18.646V8.054c0-2.854 0-4.28.879-5.167C3.757 2 5.172 2 8 2h12"/>
                    <path d="M10 8c-1.105 0-2 .672-2 1.5s.895 1.5 2 1.5s2 .672 2 1.5s-.895 1.5-2 1.5m0-6c.87 0 1.612.417 1.886 1M10 8V7m0 7c-.87 0-1.612-.417-1.886-1M10 14v1"/>
                    </g>
                    </svg>    
                        Invoices
                    </a>
                    <a href="{{ route('payments.index') }}" class=" mt-2 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-500 hover:text-white {{ request()->routeIs('payments.*') ? 'bg-blue-500 text-white' : 'text-gray-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                        <path d="M2 4.5h6.757a3 3 0 0 1 2.122.879L14 8.5m-9 5H2m6.5-6l2 2a1.414 1.414 0 1 1-2 2L7 10c-.86.86-2.223.957-3.197.227L3.5 10"/>
                        <path d="M5 11v4.5c0 1.886 0 2.828.586 3.414S7.114 19.5 9 19.5h9c1.886 0 2.828 0 3.414-.586S22 17.386 22 15.5v-3c0-1.886 0-2.828-.586-3.414S19.886 8.5 18 8.5H9.5"/>
                        <path d="M15.25 14a1.75 1.75 0 1 1-3.5 0a1.75 1.75 0 0 1 3.5 0"/>
                    </g>
                    </svg>    
                    Payments
                    </a>

                    
                </nav>
                <!-- Form Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="block w-full py-2.5 px-4 rounded transition duration-200 bg-blue-500 text-white hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path stroke-dasharray="36" stroke-dashoffset="36" d="M12 4h-7c-0.55 0 -1 0.45 -1 1v14c0 0.55 0.45 1 1 1h7">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="36;0"/>
                        </path>
                        <path stroke-dasharray="14" stroke-dashoffset="14" d="M9 12h11.5">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="14;0"/>
                        </path>
                        <path stroke-dasharray="6" stroke-dashoffset="6" d="M20.5 12l-3.5 -3.5M20.5 12l-3.5 3.5">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="6;0"/>
                        </path>
                    </g>
                </svg>   
                    Logout
                    </button>
                    </form>
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