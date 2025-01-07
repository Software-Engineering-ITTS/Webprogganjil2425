<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page | Sistem Pemeliharaan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>

<body>

    <h1 class="text-center mt-5">Selamat Datang di Sistem Pemeliharaan Mesin Mobil</h1>

    <div class="text-center">
        <a href="{{ route('mesin.tampil') }}" class="btn btn-primary mt-5">Kelola Data Mesin</a>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; 2024 Sistem Pemeliharaan Mesin</p>
    </footer>

</body>
</html>
