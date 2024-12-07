<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <h1>TOKO BUKU SEDERHANA</h1>
    <div style="display:flex; gap:2rem;">
            <a href="/create">Tambah Data</a>
            <a href="/detail">Lihat Transaksi</a>
        </div>
        
        <h2>Show Data</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>COVER</th>
                    <th>JUDUL</th>
                    <th>PENULIS</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
        <tr>
            <td><img width="100" src="img/{{ $items->img }}"></td>
            <td>{{ $items->judul }}</td>            
            <td>{{ $items->Penulis }}</td>            
            <td>{{ $items->Harga }}</td>            
            <td>{{ $items->Stok }}</td>
            <td>
                <a href="/transaksi/{{ $items->id }}/edit"> 
                    <button type="submit">Beli</button>
                </a>
            </td>
            <td>
                <a href="/toko/{{ $items->id }}/edit"> 
                    <button type="submit">Edit</button>
                </a>
            </td>
            <form method="POST" action="/toko/{{ $items->id }}">
                @method('delete')
                @csrf
            <td><a href="/toko/{{ $items->id }}/destroy" > 
                <button type="submit">Delete</button>
                </a></td>  
            </form>   
            
            
            
            @endforeach
        </tr>
        </tbody>
    </table>
</body>
</html>