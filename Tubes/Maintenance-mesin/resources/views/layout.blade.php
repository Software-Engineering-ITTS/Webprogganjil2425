<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Pemeliharaan')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" >Sistem Pemeliharaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/mesin/tambah') }}">Tambah Mesin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jadwal.index') }}">Penjadwalan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/mesin/maintenance') }}">Maintenance</a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

    {{-- konten utama --}}

    <div class="mt-5 container">
        @yield('konten')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 Sistem Pemeliharaan Mesin</p>
    </footer>
</body>
</html>
