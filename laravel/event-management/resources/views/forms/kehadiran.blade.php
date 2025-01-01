<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kehadiran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Konfirmasi Kehadiran</h1>
        <form action="{{ route('kehadiran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="event_code" class="form-label">Kode Acara</label>
                <input type="text" class="form-control" id="event_code" name="event_code" required>
            </div>
            <div class="mb-3">
                <label for="bukti_foto" class="form-label">Upload Bukti Foto</label>
                <input type="file" class="form-control" id="bukti_foto" name="bukti_foto" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Konfirmasi Kehadiran</button>
        </form>
    </div>
</body>
</html>
