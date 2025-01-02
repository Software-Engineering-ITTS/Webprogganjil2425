<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventaris Barang Toko Marchella</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 dark:bg-gray-900 overflow-hidden">
    <div id="app">
        @include('shared.header')
        <div class="flex h-screen overflow-hidden w-full">
            @include('shared.sidebar')
            <!-- Main Content Area -->
            <div id="mainContent" class="flex-1 overflow-hidden transition-all duration-300 ease-in-out relative">
      
                    @yield('content')
              
            </div>
        </div>
    </div>
</body>


<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarnav = document.getElementById('sidebarnav');
    const mainContent = document.getElementById('mainContent');
    const isSidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isSidebarCollapsed) {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('lg:w-64');
        sidebar.classList.add('lg:w-0');
        sidebarnav.classList.add('hidden');

        mainContent.classList.add('-translate-x');
        mainContent.classList.add('w-full');

    } else if (window.innerWidth >= 1024) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('lg:w-64');
        sidebar.classList.remove('lg:w-0');
        sidebarnav.classList.remove('hidden');

        mainContent.classList.remove('-translate-x');
        mainContent.classList.remove('w-full');
    }

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        const isCollapsed = sidebar.classList.contains('-translate-x-full');
        localStorage.setItem('sidebarCollapsed', isCollapsed);


        if (isCollapsed) {
            sidebar.classList.add('w-0');
            sidebarnav.classList.add('hidden');
            sidebar.classList.remove('lg:w-64');

            mainContent.classList.add('-translate-x-50');
            mainContent.classList.add('w-full');
        } else {
            sidebar.classList.remove('w-0');
            sidebarnav.classList.remove('hidden');
            sidebar.classList.add('lg:w-64');

            mainContent.classList.remove('-translate-x-50');
            mainContent.classList.remove('w-full');
        }
    });



    window.addEventListener('resize', checkScreenWidth);
    checkScreenWidth();
</script>

</html>