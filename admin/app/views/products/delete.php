<?php
require "app/controllers/ProductsController.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (Delete($id)) {
        echo "<script>
            alert('data berhasil dihapus!');
            window.location.href='index.php?page=products';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data!');
            window.location.href='index.php?page=products';
        </script>";
    }
} else {
    header("Location: index.php?page=products");
    exit();
}
?>