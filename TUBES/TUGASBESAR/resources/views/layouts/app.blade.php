<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

    
    <nav class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="#" class="text-2xl font-bold text-indigo-500 hover:text-indigo-300">Admin Panel</a>
            <div class="space-x-4">
                <a href="/admin/dashboard" class="text-gray-300 hover:text-white transition duration-200">Dashboard</a>
                <a href="/admin/calendar" class="text-gray-300 hover:text-white transition duration-200">Calendar</a>
                <a href="/logout" class="text-gray-300 hover:text-white transition duration-200"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>


    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

</body>
</html>




 