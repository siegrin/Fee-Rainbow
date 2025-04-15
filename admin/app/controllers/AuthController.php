<?php
require_once 'app/models/auth.php';
check_remember_me($conn);

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (login($conn, $username, $password)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location.href='index.php?page=login';</script>";
    }
}

?>