<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <form method="POST" action="/toko">
        @csrf
        <div class="mb-3">
            <label for="Judul">Judul</label>
            <input type="text" name="Judul" id="Judul">
        </div>
        <div class="mb-3">
            <label for="Penulis">Penulis</label>
            <input type="text" name="Penulis" id="Penulis">
        </div>
        <div class="mb-3">
            <label for="Harga">Harga</label>
            <input type="text" name="Harga" id="Harga">
        </div>
        <div>
            <label for="Stok">Stok</label>
            <input type="text" name="Stok" id="Stok">
        </div>
        <div class="mb-3">
            <label for="img">Cover</label>
            <input type="file" name="img" id="img">
        </div>
        <button type="submit">Submit</button>
    </form>
    <a href='/'>Balik</a>
</body>
</html>