<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Pendaftaran Sukses!</h1>
        <div class="alert alert-success">
            <p>Terima kasih <strong>{{ $name }}</strong> telah mendaftar.</p>
            <p>Kode acara Anda adalah:</p>
            <h2 class="text-center text-primary">{{ $eventCode }}</h2>
        </div>
        <p class="mt-3">Gunakan kode ini untuk mengisi <a href="{{ route('kehadiran') }}">form konfirmasi kehadiran</a>.</p>
    </div>
</body>
</html>
