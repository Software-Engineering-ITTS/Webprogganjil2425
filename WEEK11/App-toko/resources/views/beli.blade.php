<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    @foreach ($data as $items)
    <h1>Pembelian Buku</h1>
    <img width="100" src="/img/{{ $items->img }}">
    <div>{{ $items->judul }}</div>
    <div>{{ $items->Penulis }}</div>
    <div>{{ $items->Harga }}</div>
    <form method="POST" action="/transaksi">
        @csrf
        <div>
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama">
        </div>
        <div>
            <label for="NomorTelepon">NomorTelepon</label>
            <input type="text" name="NomorTelepon" id="NomorTelepon">
        </div>
        <input type="hidden" name="status" value="Berhasil">
            
        <input type="hidden" name="toko_id" value="{{ $items->id }}"></input>
        <button type="submit">Submit</button>
        @endforeach
    </form>
    <a href='/'>Balik</a>
</body>
</html>