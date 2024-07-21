<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "perpusda");
if (empty($koneksi)) {
    echo "database gagl tersambung";
}

$gagal = "";
$username = "";
$password = "";



if (isset($_COOKIE['cookie_username'])) {
    header('location: dashboard.php');
    exit();
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if (empty($username) && empty($password) && empty($comfirm_password)) {
        $gagal = "Isi data terlebih dahulu";
    } elseif ($password != $confirm_password) {
        $gagal = "Password yang anda masukkan kurang tepat";
    } else {
        $password_enkripsi = md5($password);
        $query = mysqli_query($koneksi, "INSERT into login(username, password) VALUES ('$username', '$password_enkripsi')");

        if ($query) {
            header('location: login.php');
            exit();
        } else {
            $gagal = "Data gagal dimasukkan";
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
                <h3 class="card-title text-center mb-4">Register</h3>
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

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Enter your password">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="signup" value="signup" class="btn btn-primary w-100">Sign
                            Up</button>
                    </div>
                    <div class="mb-3">
                        <p>Have already account?<a href="login.php">Sign In</a></p>
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