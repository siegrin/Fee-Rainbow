<?php
require 'constant.php'; // Pastikan nama file benar

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>
