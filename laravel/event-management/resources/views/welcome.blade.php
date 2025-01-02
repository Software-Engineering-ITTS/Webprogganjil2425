<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="">
    {{-- Navigation --}}
    <nav class="navbar sticky-top navbar-expand-lg bg-primary">
        <div class="container">
            <div class="d-flex w-100 justify-content-between align-items-center d-none d-sm-none d-md-none d-lg-flex" >
                <div id="logo">
                    <h2 class="fw-bold text-white">Event Management</h2>
                </div>

                <ul class="navbar-nav d-flex gap-4 align-items-center list-unstyled">
                    <li class="nav-item">
                        <a class="nav-link text-white text-decoration-none" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-decoration-none" href="#Events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-decoration-none" href="#News">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white text-decoration-none" href="#Contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm " href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm " href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="Home" class=" px-5 bg-warning " style=" padding-top: 5rem;  padding-bottom: 15rem;">
        <div class="container">
            <div class="d-sm-grid  d-md-grid d-lg-flex gap-2  justify-content-center align-items-center flex-row-reverse  ">
                <div class="profile-header">
                    <img class="d-none d-sm-none d-md-flex d-lg-flex" src="/asset/hero.jpg" alt="hero" width="800">
                </div>
                <div class="d-flex flex-column gap-3 justify-content-start align-items-start" >
                    <h1 class="profile-header fw-bold w-50  text-black" style="font-size: 3rem;">Biggest International Event</h1>
                    <button class="mt-3 btn btn-primary ">
                        <a href="{{route('register')}}" class="text-white text-decoration-none button-header py-1 px-5 rounded-5 d-flex  button-header " style="font-size: 1.5rem;">Register Now</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="Events" class="mt-5" style="background-color: white; padding-top: 10rem;  padding-bottom: 8rem;" >
        <div class="container">
            <div class="d-sm-grid  d-md-grid d-lg-flex gap-2  justify-content-center align-items-center flex-row-reverse  ">
                <div class="profile-header">
                    <img class="d-none d-sm-none d-md-flex d-lg-flex" src="/asset/event.png" alt="hero" width="1000">
                </div>
                <div class="d-flex flex-column gap-3 justify-content-start align-items-start" >
                    <h1 class="profile-header fw-bold w-75 " style="font-size: 3rem;">Conference, Seminars, & Events</h1>
                    <p class="w-100 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam corporis ut odio adipisci molestiae! Asperiores, minus, rem necessitatibus incidunt, cupiditate labore officiis repudiandae modi eos aperiam laborum suscipit assumenda fugit?</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="News" class="mt-5 bg-warning" style="padding-top: 7rem; padding-bottom: 12rem ">
        <div class="container">
            <h1 class="text-center fw-bold mb-5 text-black">Latest News</h1>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="/asset/news/news1.jpg" class="card-img-top" alt="News 1">
                        <div class="card-body">
                            <h5 class="card-title">News Title 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula augue ut lacus .</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="/asset/news/news2.jpg" class="card-img-top" alt="News 2">
                        <div class="card-body">
                            <h5 class="card-title">News Title 2</h5>
                            <p class="card-text">Suspendisse potenti. Curabitur non massa ut nunc interdum efficitur. Integer bibendum, libero eu .</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="/asset/news/news3.jpg" class="card-img-top" alt="News 3">
                        <div class="card-body">
                            <h5 class="card-title">News Title 3</h5>
                            <p class="card-text">Aenean nec sapien sit amet eros tincidunt tincidunt ut a urna. Etiam auctor ligula id ante gravida viverra.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div id="Contact" class=" mt-5" style="background-color: white; padding-top: 10rem; padding-bottom: 10rem;" >
            <h1 class="text-center fw-bold mb-5 ">Contact Us</h1>
            <div class="container d-flex flex-row justify-content-center gap-5 align-items-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16336106.75840077!2d97.06699850901485!3d-1.5769136482092045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6810049e29d85%3A0x9807686070a28ff8!2sfarhan%20kebab!5e0!3m2!1sen!2sid!4v1735782822476!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="d-flex flex-column justify-content-between align-items-start gap-4">
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="fw-bold">Address</h5>
                        <p class="mb-0">123 Event Street</p>
                        <p class="mb-0">Cityville, ST 12345</p>
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="fw-bold">Phone</h5>
                        <p class="mb-0">+1 (123) 456-7890</p>
                        <p class="mb-0">Mon-Fri: 9 AM - 5 PM</p>
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="fw-bold">Email</h5>
                        <p class="mb-0">support@eventmanagement.com</p>
                        <p class="mb-0">info@eventmanagement.com</p>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="bg-primary d-flex align-items-center justify-content-center">
                <p class="mt-3 text-white">© 2025 All Rights Reserved.</p>
        </footer>
    
</body>
</html>