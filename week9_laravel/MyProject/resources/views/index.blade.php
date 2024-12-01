<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        table {
            width: 50%;
            margin-top: 20px;
            border: 2px solid #000;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="/Mahasiswa">
    @csrf  
    <div class="mb-3">
        <label for="">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required>
    </div>
    <div class="mb-3">
        <label for="">NAMA</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
    </div>
    <div class="mb-3">
        <label for="">PRODI</label>
        <input type="text" name="prodi" id="prodi" value="{{ old('prodi') }}" required>
    </div>
    <div class="mb-3">
        <label for="">ALAMAT</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
    </div>

    <input type="hidden" name="id_fakultas" value="1">
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>

        <h1>Data Mahasiswa</h1>
    <table>
        <thead>
            
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
    @foreach ($mahasiswas as $mhs)
    <tr>
        <td>{{ $mhs->nim }}</td> 
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->prodi }}</td>
        <td>{{ $mhs->alamat }}</td>
        <td>
            <form method="GET" action="/mahasiswa/{{ $mhs->id }}/edit" style="display:inline;">
                <button type="submit">Edit</button>
            </form>
            <form method="POST" action="/mahasiswa/{{ $mhs->id }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>

    </form>

</body>
</html>