<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Buku Baru</h1>
    <form method="POST" action="/toko/{{ $data->id }}">
        @method('put')
        @csrf
        <div>
            <label for="Judul">Judul</label>
            <input type="text" name="Judul" id="Judul" value="{{ $data->judul }}">
        </div>
        <div>
            <label for="Penulis">Penulis</label>
            <input type="text" name="Penulis" id="Penulis" value="{{ $data->Penulis }}">
        </div>
        <div>
            <label for="Harga">Harga</label>
            <input type="text" name="Harga" id="Harga" value="{{ $data->Harga }}">
        </div>
        <div>
            <label for="Stok">Stok</label>
            <input type="text" name="Stok" id="Stok">
        </div>
        <img width="100" src="/img/{{ $data->img }}">
        <div>
            <label for="img">Cover</label>
            <input type="file" name="img" id="img" value="{{ $data->img }}">
        </div>
        <button type="submit">Submit</button>
    </form>
    <a href='/'>Balik</a>
</body>
</html>