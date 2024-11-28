<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota Perpustakaan</title>
    <style>
        /* Gaya dasar untuk keseluruhan halaman */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #121419, #2b3435);
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
        .register-box input[type="password"],
        .register-box select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Gaya untuk tombol */
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
        .login-link {
            display: block;
            margin-top: 20px;
            color: #4facfe;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <h2>Pendaftaran Anggota Perpustakaan</h2>
        <form action="{{route('proses_daftar')}}" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <select name="jkl" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <button type="submit">Daftar</button>
        </form>

        <a href="/home" class="login-link">Kembali</a>
    </div>
</body>
</html>