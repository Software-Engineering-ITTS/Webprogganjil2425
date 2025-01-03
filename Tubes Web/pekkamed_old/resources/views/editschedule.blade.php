<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule Doctor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Edit Schedule for Dr. {{ $schedule->nama }}</h2>

        <form action="{{ route('schedule', $schedule->iddokter) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $schedule->nama) }}" required>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <input type="date" name="hari" class="form-control" id="hari" value="{{ old('hari', $schedule->hari) }}" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="time" name="waktu" class="form-control" id="waktu" value="{{ old('waktu', $schedule->waktu) }}" required>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" id="spesialis" value="{{ old('spesialis', $schedule->spesialis) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
