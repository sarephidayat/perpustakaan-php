<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header('location:login.php');
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "perpusda");
if (empty($koneksi)) {
    echo "Database gagal tersambung";
}

$nama = "";
$alamat = "";
$email = "";
$pendidikan_terakhir = "";
$gagal = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];

    if ($nama && $alamat && $email && $pendidikan_terakhir) {
        $query = mysqli_query($koneksi, "INSERT into karyawan(nama, alamat, email, pendidikan_terakhir) VALUES ('$nama', '$alamat', '$email', '$pendidikan_terakhir')");

        if ($query) {
            header('location: ../index.php');
            exit();
        } else {
            $gagal = "Data gagal dimasukkan";
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
        <!-- Tombol Logout -->
        <div class="d-flex justify-content-end my-3">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- untuk create -->
        <div class="card ">
            <div class="card-header ">
                Create Data karyawan
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
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $email ?>" class="form-control"
                            placeholder="Contoh: syarifhidayat@gmail.com" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="<?php echo $alamat ?>" class="form-control"
                            placeholder="Contoh: Dukuh randu sari, Senenan" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                        <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-select">
                            <option value="">--pilih pendidikan terakhir anda--</option>
                            <option value="SARJANA" <?php if ($pendidikan_terakhir == 'SARJANA')
                                echo 'selected'; ?>>
                                SARJANA</option>
                            <option value="DIPLOMA 1" <?php if ($pendidikan_terakhir == 'DIPLOMA 1')
                                echo 'selected'; ?>>
                                DIPLOMA 1</option>
                            <option value="DIPLOMA 2" <?php if ($pendidikan_terakhir == 'DIPLOMA 2')
                                echo 'selected'; ?>>
                                DIPLOMA 2</option>
                            <option value="DIPLOMA 3" <?php if ($pendidikan_terakhir == 'DIPLOMA 3')
                                echo 'selected'; ?>>
                                DIPLOMA 3</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" value="simpan data" class="btn btn-primary">Submit</button>
                    <a href="../index.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>