<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Event Form</h2>

        <form action="/event" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Nama Event Input -->
                <div>
                    <label for="namaevent" class="block text-sm font-medium text-gray-700">Nama Event:</label>
                    <input type="text" name="namaevent" id="namaevent" 
                        class="mt-2 w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Enter event name" required>
                </div>

                <!-- Tanggal Event Input -->
                <div>
                    <label for="tanggalevent" class="block text-sm font-medium text-gray-700">Tanggal Event:</label>
                    <input type="text" name="tanggalevent" id="tanggalevent" 
                        class="mt-2 w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Enter event date" required>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" 
                        class="w-full bg-blue-500 text-white font-semibold p-4 rounded-md hover:bg-blue-600 transition duration-300">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
