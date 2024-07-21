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


$judul = "";
$penulis = "";
$isbn = "";
$tahun_terbit = "";
$penerbit = "";
$kategori = "";
$gagal = "";

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $isbn = mysqli_real_escape_string($koneksi, $_POST['isbn']);
    $tahun_terbit = mysqli_real_escape_string($koneksi, $_POST['tahun_terbit']);
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    if ($judul && $penulis && $isbn && $tahun_terbit && $penerbit && $kategori) {
        $query = mysqli_query($koneksi, "INSERT into buku(judul, penulis, isbn, tahun_terbit, penerbit, kategori) VALUES('$judul', '$penulis', '$isbn', '$tahun_terbit', '$penerbit', '$kategori')");

        if ($query) {
            header('location: index.php');
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
        <div class="d-flex justify-content-end my-3">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- untuk create -->
        <div class="card ">
            <div class="card-header ">
                Create Data Buku
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
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" value="<?php echo $judul ?>" id="judul" class="form-control"
                            placeholder="Contoh: Kebanggaan dan Prasangka" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" value="<?php echo $penulis ?>" id="penulis"
                            class="form-control" placeholder="Contoh: Jane Austen" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" value="<?php echo $isbn ?>" id="isbn" class="form-control"
                            placeholder="Contoh: 978-1-85326-000-2" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" value="<?php echo $tahun_terbit ?>" id="tahun_terbit"
                            class="form-control" placeholder="Contoh: 1813" autofocus>
                    </div>
                    <div class="penerbit">
                        <label for="penerbit" class="form-label">penerbit</label>
                        <input type="text" name="penerbit" value="<?php echo $penerbit ?>" id="penerbit"
                            class="form-control" placeholder="Contoh: T. Egerton" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">kategori</label>
                        <input type="text" name="kategori" value="<?php echo $kategori ?>" id="kategori"
                            class="form-control" placeholder="Contoh: Romansa" autofocus>
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