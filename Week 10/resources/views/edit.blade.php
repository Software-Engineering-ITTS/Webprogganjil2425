<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <title>Edit Data Mahasiswa</title>
</head>
<body class="container mt-4">
    <h3 class="text-center">Edit Data Mahasiswa</h3>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nim" class="form-label">Nim: </label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama: </label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi: </label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
        </div>

        <div class="mb-3">
            <label for="id_fakultas" class="form-label">Fakultas: </label>
            <select name="id_fakultas" id="id_fakultas" class="form-select">
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $mahasiswa->id_fakultas == $f->id ? 'selected' : '' }}>{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat: </label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $mahasiswa->alamat }}">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Baru (opsional): </label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($mahasiswa->foto)
                <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
