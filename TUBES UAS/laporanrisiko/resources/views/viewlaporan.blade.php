<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Prioritas Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #28a745;
        }
        h1 {
            font-size: 1.75rem;
        }
        .container {
            max-width: 800px;
        }
        .btn-custom-green {
            background-color: #28a745;
            border: none;
            color: white;
            font-weight: bold;
            width: 100%;
            text-align: center;
        }
        .btn-custom-green:hover {
            background-color: #218838;
        }
        .btn-secondary {
            width: 100%;
            text-align: center;
        }
        header img {
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <header class="bg-custom-green text-white py-3">
        <div class="container d-flex align-items-center">
            <img src="https://ih1.redbubble.net/image.5278499885.1380/flat,750x,075,f-pad,750x1000,f8f8f8.u1.jpg" alt="Logo" class="me-3" style="width: 50px; height: 50px;">
            <h1 class="m-0 flex-grow-1">Sistem Laporan Prioritas Risiko</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning ">Logout</button>
            </form>
        </div>
    </header>

    <div class="container mt-4">
        <button class="btn btn-warning"><a href="/admin/dashboard" class="text-decoration-none text-dark">Kembali</a></button>
        <br><br>
        <h2>Laporan Risiko</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelapor</th>
                    <th>Judul Risiko</th>
                    <th>Kategori</th>
                    <th>Tanggal Identifikasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanRisiko as $laporan)
                    <tr>
                        <td>{{ $laporan->id }}</td>
                        <td>{{ $laporan->nama_pelapor }}</td>
                        <td>{{ $laporan->judul_risiko }}</td>
                        <td>{{ $laporan->kategori_risiko }}</td>
                        <td>{{ $laporan->tanggal_identifikasi }}</td>
                        <td>
                            <a href="{{ route('admin.beriPenanggulangan', $laporan->id) }}" class="btn btn-primary">Beri Penanggulangan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br><br><br><br><br>

    <footer class="bg-custom-green text-white py-3 mt-5 fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Laporan Risiko . all rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
