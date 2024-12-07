<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muhammad Khafidh Ainur Rasyidh</title>
</head>
<body>
    <h1>Form Mahasiswa</h1>
    <form action="/mahasiswa" method="POST">
        @csrf
        <div>
            <label for="NIM">NIM : </label>
            <input type="text" name="NIM" id="NIM">
        </div>
        <div>
            <label for="NAMA">NAMA : </label>
            <input type="text" name="NAMA" id="NAMA">
        </div>
        <div>
            <label for="PRODI">PRODI : </label>
            <input type="text" name="PRODI" id="PRODI">
        </div>
        <div>
            <label for="ALAMAT">ALAMAT : </label>
            <input type="text" name="ALAMAT" id="ALAMAT">
        </div>
        <input type="id_fakultas" name="id_fakultas" id="" value="1" hidden>
        <button type="submit">SUBMIT</button>
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="10" cellspacing="0">
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
            @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->NIM }}</td>
                <td>{{ $mhs->NAMA }}</td>
                <td>{{ $mhs->PRODI }}</td>
                <td>{{ $mhs->ALAMAT }}</td>
                <td>
                <button type="button" onclick="window.location.href='/mahasiswa/{{ $mhs->id }}/edit'">Edit</button>
                    <form action="/mahasiswa/{{ $mhs->id }}" method="POST" style="display: inline;">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>