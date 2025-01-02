<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Kehadiran Form</h2>

        <form action="/kehadiran" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Hidden input for id_event -->
                <input type="text" name="id_event" id="id_event" value="{{ $data->id }}" hidden>

                <!-- Datadiri Input -->
                <div>
                    <label for="datadiri" class="block text-sm font-medium text-gray-700">Datadiri:</label>
                    <input type="text" name="datadiri" id="datadiri" 
                        class="mt-2 w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Enter your full name" required>
                </div>

                <!-- Hadir Input -->
                <div>
                    <label for="hadir" class="block text-sm font-medium text-gray-700">Hadir:</label>
                    <input type="text" name="hadir" id="hadir" 
                        class="mt-2 w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Yes/No" required>
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
