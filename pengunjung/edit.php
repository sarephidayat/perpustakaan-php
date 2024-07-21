<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header('location: ../login.php');
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "perpusda");
if (empty($koneksi)) {
    echo "Database gagal tersambung";
}

$nama = "";
$alamat = "";
$pekerjaan = "";
$gagal = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT *FROM pengunjung WHERE id ='$id'");
    $result = mysqli_fetch_array($query);

    if ($result) {
        $nama = $result['nama'];
        $alamat = $result['alamat'];
        $pekerjaan = $result['pekerjaan'];
    } else {
        $gagal = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];

    if ($nama && $alamat && $pekerjaan) {
        $query = mysqli_query($koneksi, "UPDATE pengunjung set nama = '$nama', alamat = '$alamat', pekerjaan = '$pekerjaan' WHERE id = '$id'");

        if ($query) {
            header('location: index.php');
            exit();
        } else {
            $gagal = "Data gagal di UPDATE";
        }
    } else {
        $gagal = "Tolong masukkan data dengan benar";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body,
        html {
            background-image: url(../blue-snow.png);
        }

        .mx-auto {
            width: 800px;
        }

        .card {
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">

        <!-- untuk update -->
        <div class="card ">
            <div class="card-header ">
                Update Data Pengunjung
            </div>
            <div class="card-body">
                <?php
                if ($gagal) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $gagal ?>
                    </div>
                    <?php
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" value="<?php echo $nama ?>" id="nama" class="form-control"
                            placeholder="Contoh: Muhammad Syarifudin Hidayat" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="<?php echo $alamat ?>" class="form-control"
                            placeholder="Contoh: Dukuh randu sari, Senenan" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $pekerjaan ?>"
                            class="form-control" placeholder="Contoh: PNS" autofocus>
                    </div>
                    <button type="submit" name="submit" value="simpan data" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>