<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Times New Roman', Times, serif;
            background-image: url(bgadmin.jpg);
            /* background-color: #2c4765; */
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 50%;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            /* seperti absolute */
            transform: translate(-50%, -50%);
        }
        .bg-light-blue{
            background-color: #96d0fd;
        }
        .navbar-nav.ml-auto{
            margin-left: auto;
        }
        .nav-item{
            margin-left: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light-blue w-100">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Form
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('formregistrasi')}}">Form Pendaftaran</a>
                        <a class="dropdown-item" href="{{ route('formkonsultasi')}}">Form Konsultasi</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="https://wa.me/6285606782174">Contact Person</a>
                        <a class="dropdown-item" href="https://wa.me/6285606782174">Contact Emergency</a>

                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                    </a>



                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Back To Home
                    </a>
                </div>


                </li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <h2>Welcome To Pekkamed!</h2>
        <p>Pekkamed adalah solusi inovatif yang dirancang untuk memberikan layanan konsultasi kesehatan online terbaik. Kami siap melayani Anda 24/7 dengan dokter-dokter terpercaya yang siap membantu Anda kapan saja dan di mana saja.</p>
        <p>Jika anda mengalami kondisi darurat hubungi contact diatas</p>
    </div>



    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
