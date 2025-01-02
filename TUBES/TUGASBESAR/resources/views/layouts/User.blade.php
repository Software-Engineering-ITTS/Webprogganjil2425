<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">

  
    <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-semibold">User Panel</a>
            <div class="space-x-4">
                <a href="/logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="text-white hover:text-gray-400 transition duration-200">
                   Logout
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>

</body>
</html>
