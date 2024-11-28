<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            min-width: 200px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar a i {
            margin-right: 8px;
            /* Memberikan jarak antara ikon dan teks */
        }

        .content {
            padding: 20px;
            flex: 1;
        }

        .container {
            display: flex;
            flex-direction: row;
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>Dashboard</h1>
    </div>

    <!-- Container untuk Sidebar dan Konten Utama -->
    <div class="container">
        <!-- Sidebar -->
        @include('admin/layout/sidebar')

        <!-- Konten Utama -->
        <div class="content">
            <h2>Tambah Buku</h2>
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route('proses-edit-buku')}}" method="POST">
                        @csrf
                        <input type="text" name="id_buku" value="{{$dataBuku->id_buku}}" hidden>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$dataBuku->judul}}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" class="form-control" name="penulis" value="{{$dataBuku->penulis}}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" name="deskripsi" required>{{$dataBuku->deskripsi}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pilihan">Kategori</label>
                            <select class="form-control" name="kategori" required>
                                <option value="Fiksi" @if($dataBuku->kategori === 'Fiksi') selected @endif>Fiksi</option>
                                <option value="Ilmiah" @if($dataBuku->kategori === 'Ilmiah') selected @endif>Ilmiah</option>
                                <option value="Edukasi" @if($dataBuku->kategori === 'Edukasi') selected @endif>Edukasi</option>
                                <option value="Sejarah" @if($dataBuku->kategori === 'Sejarah') selected @endif>Sejarah</option>
                                <option value="Politik" @if($dataBuku->kategori === 'Politik') selected @endif>Politik</option>
                            </select>
                        </div>                        
                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun_terbit" value="{{$dataBuku->tahun_terbit}}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Ketersediaan</label>
                            <input type="number" class="form-control" name="jumlah_ketersediaan" value="{{$dataBuku->jumlah_ketersediaan}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>