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
                <h2>Data Anggota</h2>
                <a href="/tambah-user-agt" class='btn btn-primary pt-2'>Tambah</a>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table text-truncate">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jkl</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tgl Gabung</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAgt as $dataAgt)
                                <tr>
                                    <td>{{ $no = $no + 1 }}</td>
                                    <td>{{ $dataAgt->nama }}</td>
                                    <td>{{ $dataAgt->email }}</td>
                                    <td>{{ $dataAgt->jkl }}</td>
                                    <td>{{ $dataAgt->alamat }}</td>
                                    <td>{{ date("d-m-Y", strtotime($dataAgt->tanggal_bergabung ))}}</td>
                                    <td class='d-flex justify-content-center gap-2' style='gap: 10px'>
                                        <a href="javascript:void(0);" class="btn btn-danger"
                                            onclick="confirmDeletion({{ $dataAgt->id_anggota }})">Hapus</a>
                                        <a href="/edit-agt?id_anggota={{ $dataAgt->id_anggota }}"
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
    function confirmDeletion(id_anggota) {
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
                window.location.href = `/hapus-agt?id_anggota=${id_anggota}`;
            }
        });
    }
</script>

</html>
