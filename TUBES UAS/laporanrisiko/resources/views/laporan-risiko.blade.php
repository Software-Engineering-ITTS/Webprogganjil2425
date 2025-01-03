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
        </div>
    </header>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Form Laporan Prioritas Risiko</h1>
        <form action="{{ route('risiko.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="namaPelapor" class="form-label">Nama Pelapor</label>
                <input type="text" class="form-control" id="namaPelapor" name="namaPelapor" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan/Posisi</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="email" class="form-control" id="kontak" name="kontak" placeholder="Masukkan email atau nomor telepon">
            </div>

            <div class="mb-3">
                <label for="judulRisiko" class="form-label">Judul Risiko</label>
                <input type="text" class="form-control" id="judulRisiko" name="judulRisiko" placeholder="Masukkan judul risiko" required>
            </div>
            <div class="mb-3">
                <label for="kategoriRisiko" class="form-label">Kategori Risiko</label>
                <select class="form-select" id="kategoriRisiko" name="kategoriRisiko" required>
                    <option value="">Pilih kategori...</option>
                    <option value="Operasional">Operasional</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Keamanan">Keamanan</option>
                    <option value="Lingkungan">Lingkungan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggalIdentifikasi" class="form-label">Tanggal Identifikasi</label>
                <input type="date" class="form-control" id="tanggalIdentifikasi" name="tanggalIdentifikasi" required>
            </div>
            <div class="mb-3">
                <label for="lokasiRisiko" class="form-label">Lokasi Risiko</label>
                <input type="text" class="form-control" id="lokasiRisiko" name="lokasiRisiko" placeholder="Masukkan lokasi risiko">
            </div>

            <div class="mb-3">
                <label for="deskripsiRisiko" class="form-label">Deskripsi Risiko</label>
                <textarea class="form-control" id="deskripsiRisiko" name="deskripsiRisiko" rows="3" placeholder="Deskripsikan risiko secara rinci"></textarea>
            </div>
            <div class="mb-3">
                <label for="kemungkinan" class="form-label">Kemungkinan Terjadi</label>
                <select class="form-select" id="kemungkinan" name="kemungkinan" required>
                    <option value="">Pilih kemungkinan...</option>
                    <option value="Rendah">Rendah</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Tinggi">Tinggi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dampak" class="form-label">Dampak Risiko</label>
                <select class="form-select" id="dampak" name="dampak" required>
                    <option value="">Pilih dampak...</option>
                    <option value="Minor">Minor</option>
                    <option value="Moderat">Moderat</option>
                    <option value="Mayor">Mayor</option>
                    <option value="Kritis">Kritis</option>
                </select>
            </div>

            <button type="submit" class="btn btn-custom-green">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <footer class="bg-custom-green text-white py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Laporan Risiko | All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
