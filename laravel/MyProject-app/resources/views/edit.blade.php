<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>My Project</title>
</head>

<body class="container mt-4">
    <h1 class="text-center">Form Mahasiswa</h1>
    <form method="post" action="/mahasiswa/{{ $mahasiswa->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}">
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $mahasiswa->prodi }}">
        </div>
        <div class="mb-3">
            <label for="id_fakultas" class="form-label">Fakultas</label>
            <select name="id_fakultas" id="id_fakultas" class="form-select">
                @foreach ($fakultas as $fk)
                <option value="{{ $fk->id }}" {{ $mahasiswa->id_fakultas == $fk->id ? 'selected' : '' }}>
                    {{ $fk->nama_fakultas }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($mahasiswa->foto)
            <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="150" class="mt-3">
            @endif
        </div>
        <!-- <input type="text" name="id_fakultas" id="" value="1" hidden> -->
        <a href="/" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html> 