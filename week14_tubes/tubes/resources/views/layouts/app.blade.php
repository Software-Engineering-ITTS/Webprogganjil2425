<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white px-4 py-8">
            <div class="container mx-auto flex justify-between items-center">
                @if(Auth::user()->role === 'admin')
                        <h1 class="text-xl font-bold">Employee Management</h1>
                @elseif(Auth::user()->role === 'karyawan')
                       <h1 class="text-xl font-bold">Karyawan</h1>
                @endif
                <ul class="flex space-x-10 justify-center items-center">
                    @if(Auth::user()->role === 'admin')
                        <li class="group hover:scale-105 duration-300">
                            <a  href="{{ route('dashboard.admin') }}" >Dashboard</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a  href="{{ route('admin.presensi.index') }}" >View Kehadiran Karyawan</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a  href="{{ route('admin.izin.index') }}" >View Karyawan Izin </a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a  href="{{ route('admin.lembur.index') }}" >View Karyawan Lembur</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                    @elseif(Auth::user()->role === 'karyawan')
                        <li class="group hover:scale-105 duration-300">
                            <a href="{{ route('dashboard.karyawan') }}" >Dashboard</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a href="{{ route('presensi.create') }}" >Input Presensi</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a href="{{ route('karyawan.izin.create') }}" >Input Izin</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                        <li class="group hover:scale-105 duration-300">
                            <a href="{{ route('karyawan.lembur.create') }}" >Input Lembur</a>
                            <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                        </li>
                    @endif
                    <li class="group hover:scale-105 duration-300">
                        <form method="POST" action="{{ route('logout') }}" class="flex justify-center items-center m-0 p-0">
                            @csrf
                            <button type="submit" class="flex justify-center items-center">Logout</button>
                        </form>
                        <div class="border-transparent border-b-2 w-0 group-hover:w-full group-hover:border-white duration-300"></div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-grow container mx-auto p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>