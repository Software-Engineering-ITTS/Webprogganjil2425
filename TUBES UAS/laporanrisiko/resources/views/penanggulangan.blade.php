<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategi Penanggulangan Risiko</title>
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
            text-align: left;
        }
        .btn-custom-green:hover {
            background-color: #218838;
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

    <div class="container mt-5">
        <h1 class="text-center mb-4">Form Strategi Penanggulangan Risiko</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('risiko.submitPenanggulangan') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" id="id_risiko" name="id_risiko" placeholder="Masukkan nama atau tim yang bertanggung jawab" value="{{ $laporanRisiko->id }}">
            <div class="mb-3">
                <label for="penanggulangan" class="form-label">Deskripsi Penanggulangan</label>
                <textarea class="form-control" id="penanggulangan" name="penanggulangan" rows="3" placeholder="Jelaskan strategi penanggulangan" required></textarea>
            </div>

            <div class="mb-3">
                <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" placeholder="Masukkan nama atau tim yang bertanggung jawab" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Penanggulangan</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Pilih status...</option>
                    <option value="Belum Dimulai">Belum Dimulai</option>
                    <option value="Sedang Berjalan">Sedang Berjalan</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="target_penyelesaian" class="form-label">Target Penyelesaian</label>
                <input type="date" class="form-control" id="target_penyelesaian" name="target_penyelesaian" required>
            </div>

            <button type="submit" class="btn btn-custom-green">Submit</button>
        </form>
        <br>
        <button class="btn btn-warning"><a href="/admin/viewlaporan" class="text-decoration-none text-dark">Kembali</a></button>
        <br><br>
    </div>
    <br><br><br>

    <footer class="bg-custom-green text-white py-3 mt-5 fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Laporan Risiko . all rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
