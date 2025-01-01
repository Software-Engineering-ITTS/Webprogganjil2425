<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kehadiran</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Form Kehadiran</h2>
        <form>
            <div class="mb-3">
                <label for="full-name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="full-name" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="student-id" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                <input type="text" class="form-control" id="student-id" placeholder="Masukkan NIM" required>
            </div>

            <div class="mb-3">
                <label for="activity" class="form-label">Pilih Kegiatan</label>
                <select class="form-select" id="activity" required>
                    <option selected>Pilih kegiatan</option>
                    <option value="seminar">Seminar Nasional</option>
                    <option value="workshop">Workshop Design Thinking</option>
                    <option value="kompetisi">Kompetisi Programming</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Submit Kehadiran</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
