<?php
session_start();
$_SESSION['session_username'] == '';
$_SESSION['session_password'] == '';
session_destroy();

setcookie('cookie_username', '', time() - (60 * 60), '/');
setcookie('cookie_password', '', time() - (60 * 60), '/');

header('location: login.php');