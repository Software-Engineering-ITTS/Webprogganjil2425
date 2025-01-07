<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Sistem Pembayaran Tagihan</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to right, #4caf50, #81c784);
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-header h2 {
            font-size: 2rem;
            color: #333;
        }
        .login-header p {
            color: #666;
        }
        .login-button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #388e3c;
        }
        .input-field {
            margin-bottom: 20px;
        }
        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .input-field input:focus {
            border-color: #4caf50;
            outline: none;
        }
        .error-message {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Sistem Tagihan</h2>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="input-field">
                <label for="email" class="block text-sm font-medium text-gray-700">
                <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path stroke-dasharray="64" stroke-dashoffset="64" d="M4 5h16c0.55 0 1 0.45 1 1v12c0 0.55 -0.45 1 -1 1h-16c-0.55 0 -1 -0.45 -1 -1v-12c0 -0.55 0.45 -1 1 -1Z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/>
                        </path>
                        <path stroke-dasharray="24" stroke-dashoffset="24" d="M3 6.5l9 5.5l9 -5.5">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="24;0"/>
                        </path>
                    </g>
                </svg>
                    Email
                </span>
                </label>
                <input id="email" name="email" type="email" required 
                    class="mt-1 block">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-field">
            <label for="password" class="block text-sm font-medium text-gray-700">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12s0 5.657-1.172 6.828S17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172S2 15.771 2 12Z"/>
                            <path stroke-linecap="round" d="M12 10v4m-1.732-3l3.464 2m0-2l-3.464 2m-3.535-3v4M5 11l3.464 2m0-2L5 13m12.268-3v4m-1.732-3L19 13m0-2l-3.465 2"/>
                        </g>
                    </svg>
                    Password
                </span>
            </label>
            <input id="password" name="password" type="password" required class="mt-1 block">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" class="login-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path stroke-dasharray="36" stroke-dashoffset="36" d="M12 4h-7c-0.55 0 -1 0.45 -1 1v14c0 0.55 0.45 1 1 1h7">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="36;0"/>
                        </path>
                        <path stroke-dasharray="14" stroke-dashoffset="14" d="M9 12h11.5">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="14;0"/>
                        </path>
                        <path stroke-dasharray="6" stroke-dashoffset="6" d="M20.5 12l-3.5 -3.5M20.5 12l-3.5 3.5">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="6;0"/>
                        </path>
                    </g>
                    </svg>
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>