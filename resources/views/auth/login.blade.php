<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #a8c0ff, #3f2b96);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form-signin {
            max-width: 350px;
            padding: 2rem;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3f2b96;
        }

        .btn-primary {
            background-color: #3f2b96;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5b4aa4;
        }

        .btn-secondary,
        .btn-link {
            color: #3f2b96;
        }
    </style>
</head>

<body>
    <main class="form-signin">
        <form class="needs-validation" action="{{route('proses_login')}}" method="POST">
            <h1 class="h3 mb-3 fw-normal">LOGIN PERPUSTAKAAN DIGITAL</h1>
            @csrf
            <div class="form-floating mb-2">
                <input name="username" type="text" class="form-control" id="floatingUsername" placeholder="Username" required>
                <label for="floatingUsername">Username</label>
                <div class="invalid-feedback">
                    Masukkan username yang valid.
                </div>
            </div>

            <div class="form-floating mb-2">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Masukkan password yang valid.
                </div>
            </div>

            <button class="btn btn-primary w-100 mt-3" type="submit" name="submit_validate" value="abc">Login</button>
            <button class="btn btn-secondary w-100 mt-2" type="reset">Cancel</button>
            <a class="btn btn-link w-100 mt-2" href="./register">Daftar Akun</a>
        </form>
    </main>
</body>
</html>