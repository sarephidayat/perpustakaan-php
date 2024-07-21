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

if (isset($_GET['op']) && $_GET['op'] == 'delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = '$id'");
    if ($query) {
        header('location: index.php');
        exit();
    } else {
        $gagal = "Data gagal dihapus";
    }
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
            background-image: url(blue-snow.png);
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

        /* CSS untuk pesan Selamat Datang */
        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            /* warna teks putih */
            background-color: #007bff;
            /* warna latar biru */
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>


    <div class="mx-auto">
        <!-- Tombol Logout -->
        <div class="d-flex justify-content-end my-3">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <!-- Pesan Selamat Datang -->
        <div class="welcome-message">
            Selamat Datang <?php echo $_SESSION['session_username']; ?>
        </div>

        <!-- untuk menampilkan pesan sukses atau gagal -->


        <!-- untuk read data karyawan -->
        <div class="card">
            <div class="card-header">
                Tampilan Data Karyawan
            </div>
            <div class="card-body">
                <a href="karyawan/create.php" class="btn btn-primary mb-3">Tambah Karyawan</a>
                <a href="pengunjung/index.php" class="btn btn-success mb-3">Data Pengunjung</a>
                <a href="buku/index.php" class="btn btn-warning mb-3">Daftar Buku</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">PENDIDIKAN TERAKHIR</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- menampilkan data -->
                        <?php
                        $result = mysqli_query($koneksi, "SELECT *from karyawan ORDER BY id DESC");
                        $nomor_urut = 1;

                        while ($r1 = mysqli_fetch_array($result)) {
                            $id = $r1['id'];
                            $nama = $r1['nama'];
                            $email = $r1['email'];
                            $alamat = $r1['alamat'];
                            $pendidikan_terakhir = $r1['pendidikan_terakhir']; ?>

                            <tr>
                                <th scope="row"><?php echo $nomor_urut++ ?></th>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $alamat ?></td>
                                <td><?php echo $pendidikan_terakhir ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="karyawan/edit.php?id=<?php echo $id ?>"
                                            class="btn btn-warning btn-sm btn-icon-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="karyawan/delete.php?op=delete&id=<?php echo $id ?>"
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

        <!-- untuk read pengunjung -->
        <!-- untuk read -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>