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
        header('location: ../index.php');
        exit();
    } else {
        $gagal = "Data gagal dihapus";
    }
}
