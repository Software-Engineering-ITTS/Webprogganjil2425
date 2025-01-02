<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex min-h-screen">
        <div class="w-64 bg-gradient-to-r from-green-700 to-green-500 text-white p-6">
            <div class="mb-8 text-center">
                <!-- Logo -->
                <img src="https://img.freepik.com/premium-vector/play-technology-logo-design-template-triangle-icons_526811-214.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid" alt="Logo" class="w-20 h-20 mx-auto rounded-full">
                <h2 class="text-2xl font-bold mt-4">PT Culers Indonesia</h2>
            </div>
            <ul class="space-y-4">
                <li><a href="/" class="block text-white hover:bg-green-600 px-4 py-2 rounded">Home</a></li>
                <li><a href="/karyawan" class="block text-white hover:bg-green-600 px-4 py-2 rounded">Data Karyawan</a></li>
                <li><a href="/presensi" class="block text-white hover:bg-green-600 px-4 py-2 rounded">Presensi</a></li>
                <li><a href="/gaji" class="block text-white hover:bg-green-600 px-4 py-2 rounded">Data Gaji</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-photo/side-view-cropped-unrecognizable-business-people-working-common-desk_1098-20474.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid');">
            <div class="p-12 bg-opacity-60 bg-green-800 text-white h-full">
                <h1 class="text-4xl font-extrabold mb-6">Selamat Datang di PT Culers Indonesia</h1>
                
                <!-- Content Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="https://img.freepik.com/premium-vector/business-people-presentation-meeting-training-concept_344186-6374.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid" alt="Karyawan" class="w-full h-32 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Karyawan</h3>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="https://img.freepik.com/free-vector/man-checking-list-background_23-2148076750.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid" alt="Presensi" class="w-full h-32 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Presensi</h3>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="https://img.freepik.com/free-vector/money-income-attraction_74855-6573.jpg?ga=GA1.1.874669446.1730125110&semt=ais_hybrid" alt="Gaji" class="w-full h-32 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Gaji</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
