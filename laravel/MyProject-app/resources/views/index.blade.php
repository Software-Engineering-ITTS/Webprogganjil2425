<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="/mahasiswa">
        @csrf
<div class="mb-3">
        <label for="NIM">NIM</label>
        <input type="text" name="NIM" id="NIM">
</div>
<div class="mb-3">
        <label for="NAMA">NAMA</label>
        <input type="text" name="NAMA" id="NAMA">
</div>
<div class="mb-3">
        <label for="PRODI">PRODI</label>
        <input type="text" name="PRODI" id="PRODI">
</div>
<div class="mb-3">
        <label for="ALAMAT">ALAMAT</label>
        <input type="text" name="ALAMAT" id="ALAMAT">
        </div>
        <div class="mb-3">
            <label for="id_fakultas" class="form-label">Fakultas</label>
            <select name="id_fakultas" id="id_fakultas" class="form-select">
                @foreach ($fakultas as $fk)
                <option value="{{ $fk->id }}">{{ $fk->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <!-- <input type="text" name="id_fakultas" id="" value="1" hidden> -->
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <hr class="mt-5 mb-5">
    <h1 class="text-center">Data Mahasiswa</h1>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>
                    @if($mahasiswa->foto)
                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="foto" width="100">
                    @else
                    <p>No photo available</p>
                    @endif
                </td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->prodi }}</td>
                <td>
                    @php
                    $namafk = $fakultas->firstWhere('id', $mahasiswa->id_fakultas)->nama_fakultas;
                    @endphp
                    {{ $namafk }}
                </td>
                <td>{{ $mahasiswa->alamat }}</td>
                <td>
                    <a href="/mahasiswa/{{ $mahasiswa->id }}/edit" class="btn btn-warning" style="display: inline-block;">Edit</a>
                    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="post" style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>