<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Show Data</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>NO. TELP</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
        <tr>
            <td>{{ $items->toko_id }}</td>            
            <td>{{ $items->Nama }}</td>            
            <td>{{ $items->NomorTelepon}}</td> 
            <td>{{ $items-> status}}</td>           
            
            @endforeach
        </tr>
        </tbody>
    </table>
    <a href='/'>Balik</a>
</body>
</html>