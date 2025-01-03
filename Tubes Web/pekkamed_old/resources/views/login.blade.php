<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Times New Roman', Times, serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://wallpaperaccess.com/full/3275630.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container img {
            width: 50px;
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="checkbox"] {
            margin-right: 10px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-container a {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        .login-container .password-container {
            position: relative;
        }
        .login-container .password-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="login-container">
    <img alt="Logo" height="50" src="logologin.png" width="50"/>
    <form method="POST" action="/login">
        @csrf
        Welcome To Pekkamed
        <input placeholder="Username or Email" type="text" name="identifier" required autofocus/>
        <div class="password-container">
            <input placeholder="Password" type="password" name="password" required/>
            <i class="fas fa-eye"></i>
        </div>
        <div>
            <input id="remember-me" type="checkbox" name="remember"/>
            <label for="remember-me">Remember Me</label>
        </div>
        <br>
        <button type="submit">Log In</button>
    </form>
    <!-- <a href="#">Lost your password?</a> -->

</div>
<script>
    document.querySelector('.password-container i').addEventListener('click', function() {
        const passwordInput = document.querySelector('.password-container input');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
</body>
</html>
