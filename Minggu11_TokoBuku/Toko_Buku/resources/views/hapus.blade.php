<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <div class="m-5">
        <h1 class="ms-5">Update Data</h1>
        <form action="{{ route('mahasiswa.update', $mahasiswas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 ms-4 ps-2 mt-5">
                <label>Judul Buku :</label>
                <input type="text" name="judul" value="{{ $mahasiswas->NIM }}">
            </div>

            <div class="mb-3 ms-3">
                <label>Cover Buku :</label>
                <input type="text" name="cover" value="{{ $mahasiswas->NAMA }}">
            </div>

            <div class="mb-3 ms-3">
                <label>Pengarang :</label>
                <input type="text" name="pengarang" value="{{ $mahasiswas->PRODI }}">
            </div>

            <div class="mb-3">
                <label>Kategori :</label>
                <input type="text" name="kategori" value="{{ $mahasiswas->ALAMAT }}">
            </div>

            <div class="mb-3">
                <label>Stok :</label>
                <input type="text" name="stok" value="{{ $mahasiswas->ALAMAT }}">
            </div>

            <div class="mb-3">
                <label>Harga :</label>
                <input type="text" name="harga" value="{{ $mahasiswas->ALAMAT }}">
            </div>
            <button class="btn btn-success ms-5 mx-2" type="submit">Update</button>
        </form>
    </div>
</body>

</html>
