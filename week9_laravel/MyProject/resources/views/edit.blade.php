<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
<h1>Edit Mahasiswa</h1>
    <form method="POST" action="/Mahasiswa/{{ $mahasiswas->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ $mahasiswas->nim }}" required>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $mahasiswas->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="prodi">Prodi</label>
            <input type="text" name="prodi" id="prodi" value="{{ $mahasiswas->prodi }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ $mahasiswas->alamat }}" required>
        </div>
        <input type="hidden" name="id_fakultas" value="{{ $mahasiswas->id_fakultas }}">
        <button type="submit">Update</button>
</body>
</html>