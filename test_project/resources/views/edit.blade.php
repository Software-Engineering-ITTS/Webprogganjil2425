<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('mahasiswa.update', $mahasiswas->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label>NIM</label>
            <input type="text" name="nim" value="{{ $mahasiswas->nim }}">
        </div>
        
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $mahasiswas->nama }}">
        </div>
        
        <div>
            <label>Prodi</label>
            <input type="text" name="prodi" value="{{ $mahasiswas->prodi }}">
        </div>
        
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $mahasiswas->alamat }}">
        </div>
        
        <input type="hidden" name="id_fakultas" value="{{ $mahasiswas->id_fakultas }}">
        
        <button type="submit">Update</button>
    </form>
</body>
</html>