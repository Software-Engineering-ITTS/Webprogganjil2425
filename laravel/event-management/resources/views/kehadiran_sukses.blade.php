<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kehadiran Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header bg-success text-white">
                <h2>Konfirmasi Kehadiran Berhasil</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Selamat! Konfirmasi kehadiran Anda telah berhasil terupload.</p>
                <h5 class="mt-4">Informasi Kontak</h5>
                <p>Jika Anda memiliki pertanyaan, silakan hubungi kami:</p>
                <ul class="list-unstyled">
                    <li><strong>Email:</strong> terrafel@gmail.com</li>
                    <li><strong>Telepon:</strong> +62 819 1332 2220</li>
                </ul>
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
            </div>
            <div class="card-footer text-muted">
                Terima kasih telah hadir!
            </div>
        </div>
    </div>
</body>
</html>
