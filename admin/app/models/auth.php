<?php

function check_remember_me($conn)
{
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($conn, "SELECT username FROM admin WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        if ($row && $key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }
    }
}

function login($conn, $username, $password)
{
    // Pastikan username tidak kosong sebelum query ke database
    if ($username === '' || $password === '') {
        return false; // Jangan lanjutkan jika kosong
    }

    // Hindari SQL Injection
    $username = mysqli_real_escape_string($conn, $username);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION["login"] = true;

            if (isset($_POST["remember"])) {
                setcookie('id', $row['id'], time() + 3600, "/");
                setcookie('key', hash('sha256', $row['username']), time() + 3600, "/");
            }

            return true;
        }
    }

    return false;
}

function logout()
{
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 3600, "/");
    setcookie('key', '', time() - 3600, "/");


    header(header: "Location: index.php?page=login");
    exit;
}

?>