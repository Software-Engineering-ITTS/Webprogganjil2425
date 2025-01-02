<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Perizinan</title>
</head>
<body class="bg-gradient-to-t from-blue-500 to-white h-64 w-full">
    <div class="container">
        <div class="header">
            <div>
                <center>
                    <h2>Surat Perizinan</h2>
                    <h1>Universitas Telkom Surabaya</h1>
                    <h4>Jl. Ketintang No.156 · 0811-3278-005</h4>
                </center>
            </div>
        </div>
        <div style="padding: 15px 0px 0px 25px">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $nama }}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: {{ $nim }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $alamat }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $tanggal }}</td>
                </tr>
            </table>

            <div class="letter-content">
                <p>Dengan surat ini, kami mengajukan permohonan izin untuk melaksanakan kegiatan yang akan dilakukan di bawah ini:</p>
    
                <table class="info-table">
                    <tr>
                        <td class="label">Tempat</td>
                        <td class="value">: {{ $tempat }}</td>
                    </tr>
                    <tr>
                        <td class="label">Kegiatan</td>
                        <td class="value">: {{ $kegiatan }}</td>
                    </tr>
                </table>
    
                <p>Demikian surat izin ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
            </div>

            <div style="padding-top: 15px; display: flex; justify-content: right;">
                <div style="display: grid; grid-column: 1;">
                    <div>
                        @if ( $status == 1 )
                        <h3>Pending</h3>
                        @endif
                        @if ( $status == 2 )
                            <h3>Approved by, </h3>
                        @endif
                        @if ( $status == 3 )
                            <h3>Rejected by, </h3>
                        @endif
                    </div>
                    <div>  
                         {{ $username }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>


<style>
    @page {
        size: A4;
        margin: 20mm;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }

    .container {
        /* padding: 25px 150px; */
    }

    .header {
        display: flex;
        justify-content: center;
        gap: 50px;
        padding-bottom: 25px;
        border-bottom: 1px solid black;
    }

    .header img {
        width: 100px;
        height: 100px;
    }

    .header div {
        text-align: center;
    }

    h2, h1, h4 {
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 1.5rem;
    }

    h1 {
        font-size: 2rem;
        font-weight: bold;
    }

    h4 {
        font-size: 1rem;
        color: gray;
    }

    .letter-content {
        text-align: justify;
        margin-top: 20px;
    }

    .letter-content p {
        margin: 15px 0;
    }

    .label {
        font-weight: bold;
        text-align: left;
    }

    .value {
        text-align: left;
    }
</style>