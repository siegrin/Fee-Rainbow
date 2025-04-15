<?php
session_start();
// if (isset($_SESSION["login"])) {
//     echo "User sudah login!";
// } else {
//     echo "User belum login.";
// }


$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$subpage = isset($_GET['subpage']) ? $_GET['subpage'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : 'index';


// Tangani logout & login dalam satu kondisi
if ($page === 'logout') {
    include "app/views/auth/logout.php"; // Sesuaikan path dengan struktur folder
    exit;
} elseif ($page === 'register') {
    include "app/views/auth/register.php"; // Sesuaikan path dengan struktur folder
    exit;
} elseif ($page === 'login') {
    include "app/views/auth/login.php"; // Sesuaikan path dengan struktur folder
    exit;
} elseif ($subpage) {
    $file = "app/views/$page/$subpage/$action.php"; // **Tentukan path berdasarkan subpage & action**
} else {
    $file = "app/views/$page/$action.php"; // **Tentukan path berdasarkan subpage & action**
}

require 'app/views/auth/check.php';


// Load halaman jika ada
if (file_exists($file)) {
    include "app/views/layouts/header.php";
    require "config/helpers.php";
    include $file;
    include "app/views/layouts/footer.php";
} else {
    echo "<h2>404 - Halaman Tidak Ditemukan</h2>";
}
?>