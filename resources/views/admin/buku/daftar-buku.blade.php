<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>Dashboard</h1>
    </div>

    <div class="container">
        <!-- Sidebar -->
        @include('admin/layout/sidebar')

        <!-- Konten Utama -->
        <div class="content">
            <div class='d-flex gap-2' style='gap: 10px'>
                <h2>Data Buku</h2>
                <a href="/tambah-buku" class='btn btn-primary pt-2'>Tambah</a>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table text-truncate">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun terbit</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarBuku as $daftarBuku)
                                <tr>
                                    <td>{{ $no = $no + 1 }}</td>
                                    <td>{{ $daftarBuku->judul }}</td>
                                    <td>{{ $daftarBuku->penulis }}</td>
                                    <td class="text-truncate" style="max-width: 200px;">{{ $daftarBuku->deskripsi }}
                                    </td>
                                    <td>{{ $daftarBuku->kategori }}</td>
                                    <td>{{ $daftarBuku->tahun_terbit }}</td>
                                    <td>{{ $daftarBuku->jumlah_ketersediaan }}</td>
                                    <td class='d-flex justify-content-center gap-2' style='gap: 10px'>
                                        <a href="javascript:void(0);" class="btn btn-danger"
                                            onclick="confirmDeletion({{ $daftarBuku->id_buku }})">Hapus</a>
                                        <a href="/edit-buku?id_buku={{ $daftarBuku->id_buku }}"
                                            class='btn btn-primary'>Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function confirmDeletion(id_buku) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Buku yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `/hapus-buku?id_buku=${id_buku}`;
            }
        });
    }
</script>

</html>
