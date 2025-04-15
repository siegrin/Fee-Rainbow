<?php
// **Cek Jika User Belum Login, Redirect ke Login**
if (!isset($_SESSION['login']) && $_GET['page'] !== 'login') {
    header("Location: index.php?page=login");
    exit;
}
?>