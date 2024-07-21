<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "perpusda");
if (empty($koneksi)) {
    echo "database gagl tersambung";
}

$gagal = "";
$username = "";
$password = "";
$ingataku = "";

if (isset($_COOKIE['cookie_username'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $query = mysqli_query($koneksi, "SELECT *FROM login where username = '$cookie_username'");
    $result = mysqli_fetch_array($query);

    if ($result['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;

    }
}

if (isset($_COOKIE['cookie_username'])) {
    header('location: index.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = isset($_POST['ingataku']) ? $_POST['ingataku'] : '';

    if (empty($username) && empty($password)) {
        $gagal = "Isi data terlebih dahulu";
    } else {
        $query = mysqli_query($koneksi, "SELECT *FROM login WHERE username = '$username'");
        $result = mysqli_fetch_array($query);

        if ($result) {
            // verifikasi password
            if ($result['password'] != md5($password)) {
                $gagal = "Password Salah, Coba lagi";
            } else {
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = md5($password);

                if ($ingataku) {
                    setcookie('cookie_username', $username, time() + (60 * 60 * 24 * 2), "/");
                    setcookie('cookie_password', md5($password), time() + (60 * 60 * 24 * 2), "/");
                }

                header('location: index.php');
                exit();
            }
        } else {
            $gagal = "username tidak tersedia";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
            background-color: #f8f9fa;
            background-image: url(blue-snow.png);
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .login-card {
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login</h3>
                <?php
                if ($gagal) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($gagal) ?>
                    </div>
                    <?php
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo htmlspecialchars($username) ?>" placeholder="Enter your username"
                            autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ingataku" name="ingataku" value="1" <?php if ($ingataku)
                            echo 'checked' ?>>
                            <label for="ingataku" class="form-check-label">Ingat Aku</label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" value="login" class="btn btn-primary w-100">Login</button>
                        </div>

                        <div class="mb-3">
                            <p>Have not already account?<a href="registrasi.php"> Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>

    </html>