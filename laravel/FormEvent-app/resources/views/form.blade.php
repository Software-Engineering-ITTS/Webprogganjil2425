<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kegiatan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Form Kegiatan</h2>
        <form>
            <div class="mb-3">
                <label for="activity-name" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="activity-name" placeholder="Masukkan nama kegiatan" required>
            </div>

            <div class="mb-3">
                <label for="activity-type" class="form-label">Jenis Kegiatan</label>
                <select class="form-select" id="activity-type" required>
                    <option selected>Pilih jenis kegiatan</option>
                    <option value="seminar">Seminar</option>
                    <option value="workshop">Workshop</option>
                    <option value="kompetisi">Kompetisi</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="start-date" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start-date" required>
            </div>

            <div class="mb-3">
                <label for="end-date" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="end-date" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Kegiatan</label>
                <textarea class="form-control" id="description" rows="4" placeholder="Masukkan deskripsi kegiatan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Kegiatan</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
