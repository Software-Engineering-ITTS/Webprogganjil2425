<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <title>Data Mahasiswa</title>
</head>
<body class="container mt-4">
    <br>
    <h3 class="text-center">Tambah Data Mahasiswa</h3>

    <form action="/mahasiswa" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">Nim: </label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama: </label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi: </label>
            <input type="text" name="prodi" id="prodi" class="form-control" required>
        </div>
        <br>
        <div class="mb-3">
            <label for="id_fakultas" class="form-label">Fakultas: </label>
            <select name="id_fakultas" id="id_fakultas" class="form-select">
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach

            </select>
        </div>
        <br>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat: </label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <br>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto: </label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <br><br>

    <h3 class="text-center">List Data Mahasiswa</h3>
    <br>
    <div class="mt-3 container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nim</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">Fakultas</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td><img class="rounded mx-auto d-block" src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="110"></td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>
                            @php
                                $fk = $fakultas->firstWhere('id', $mahasiswa->id_fakultas)->nama_fakultas;
                            @endphp
                            {{ $fk }}
                        </td>
                        <td>{{ $mahasiswa->alamat }}</td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            {{-- <a href="/mahasiswa/{{ $mahasiswa->id }}" class="btn btn-warning btn-sm">Edit</a> --}}

                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('mahasiswa.destroy') }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
