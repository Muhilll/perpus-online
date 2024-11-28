<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <style>
        /* Gaya dasar untuk keseluruhan halaman */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        /* Gaya untuk kotak formulir registrasi */
        .register-box {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        /* Gaya untuk judul */
        .register-box h2 {
            margin: 0 0 20px;
            color: #333;
            font-size: 24px;
        }

        /* Gaya untuk input dan tombol */
        .register-box input[type="text"],
        .register-box input[type="email"],
        .register-box input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-box button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background-color: #4facfe;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-box button:hover {
            background-color: #00c6fb;
        }

        /* Gaya untuk link */
        .register-box .login-link {
            display: block;
            margin-top: 20px;
            color: #4facfe;
            text-decoration: none;
            font-size: 14px;
        }

        .register-box .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Registrasi Akun</h2>
        <form class="needs-validation" action="{{route('proses_register')}}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <a href="./login" class="login-link">Sudah punya akun? Login</a>
    </div>
</body>
</html>
