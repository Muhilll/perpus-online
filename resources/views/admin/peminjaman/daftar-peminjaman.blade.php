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
                <h2>Data Peminjaman</h2>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table text-truncate">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Jatuh Tempo</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPeminjaman as $dataPeminjaman)
                                <tr>
                                    <td>{{ $no = $no + 1 }}</td>
                                    <td>{{ $dataPeminjaman->anggota->nama }}</td>
                                    <td>{{ $dataPeminjaman->buku->judul }}</td>
                                    <td>{{ date("d-m-Y", strtotime($dataPeminjaman->tanggal_pinjam)) }}</td>
                                    <td>{{ $dataPeminjaman->tanggal_jatuh_tempo }}</td>
                                    <td></td>
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
    // function confirmDeletion(id_buku) {
    //     Swal.fire({
    //         title: 'Apakah Anda yakin?',
    //         text: "Buku yang dihapus tidak dapat dikembalikan!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Ya, hapus!',
    //         cancelButtonText: 'Batal'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             window.location.href = `/hapus-buku?id_buku=${id_buku}`;
    //         }
    //     });
    // }
</script>

</html>
