<!-- membuat koneksi -->
<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "perpusda");
if (empty($koneksi)) {
    echo "Koneksi gagal";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        html,
        body {
            background-image: url(../blue-snow.png);
            background-size: cover;
            background-attachment: fixed;
        }

        .mx-auto {
            width: 1100px;
        }

        .card {
            margin: 20px;
        }



        table {
            margin-top: 20px;
        }

        th,
        td {
            vertical-align: middle;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f0f4f7;
        }

        .table-striped thead {
            background-color: #f4f5ab;
        }

        /* ... kode CSS sebelumnya ... */

        .btn-icon-text {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-right: 5px;
        }

        .btn-icon-text svg {
            margin-right: 5px;
        }

        .btn-icon-text button {
            border: none;
            background: none;
            padding: 0;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- Tombol Logout -->
        <div class="d-flex justify-content-end my-3">
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- untuk read pengunjung -->
        <!-- untuk read -->
        <div class="card">
            <div class="card-header">
                Daftar Buku
            </div>
            <div class="card-body">
                <a href="create.php" class="btn btn-primary mb-3">Tambah Data Buku</a>
                <a href="../index.php" class="btn btn-danger mb-3">Back to home</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">JUDUL</th>
                            <th scope="col">PENULIS</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">TAHUN TERBIT</th>
                            <th scope="col">PENERBIT</th>
                            <th scope="col">KATEGORI</th>
                            <th scope="col" style="width: 20px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- menampilkan data -->
                        <?php
                        $result = mysqli_query($koneksi, "SELECT *from buku ORDER BY id DESC");
                        $nomor_urut = 1;

                        while ($r1 = mysqli_fetch_array($result)) {
                            $id = $r1['id'];
                            $judul = $r1['judul'];
                            $penulis = $r1['penulis'];
                            $isbn = $r1['isbn'];
                            $tahun_terbit = $r1['tahun_terbit'];
                            $penerbit = $r1['penerbit'];
                            $kategori = $r1['kategori']; ?>

                            <tr>
                                <th scope="row"><?php echo $nomor_urut++ ?></th>
                                <td><?php echo $judul ?></td>
                                <td><?php echo $penulis ?></td>
                                <td><?php echo $isbn ?></td>
                                <td><?php echo $tahun_terbit ?></td>
                                <td><?php echo $penerbit ?></td>
                                <td><?php echo $kategori ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="delete.php?op=delete&id=<?php echo $id ?>"
                                            class="btn btn-danger btn-sm btn-icon-text"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                            Hapus
                                        </a>
                                    </div>
                                </td>


                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>