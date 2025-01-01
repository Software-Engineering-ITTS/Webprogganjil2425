<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kegiatan Kampus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Selamat Datang di Pendaftaran Kegiatan Telkom University Surabaya</h1>
        <p class="text-center">Kelola kegiatan, pendaftaran, dan kehadiran peserta di sini.</p>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Form Kegiatan</h5>
                        <p class="card-text">Tambahkan dan kelola kegiatan kampus.</p>
                        <a href="/kegiatan" class="btn btn-primary">Kelola Kegiatan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Form Pendaftaran</h5>
                        <p class="card-text">Lihat dan kelola data pendaftaran peserta.</p>
                        <a href="/pendaftaran" class="btn btn-success">Kelola Pendaftaran</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Form Kehadiran</h5>
                        <p class="card-text">Lacak kehadiran peserta kegiatan.</p>
                        <a href="/kehadiran" class="btn btn-warning">Kelola Kehadiran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2024 tera's project. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
