<?php
require "app/controllers/CategoryController.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (Delete($id)) {
        echo "<script>
            alert('data berhasil dihapus!');
            window.location.href='index.php?page=categories';
        </script>";
    } else {
        echo "<script>
            alert('data menghapus kategori!');
            window.location.href='index.php?page=categories';
        </script>";
    }
} else {
    header("Location: index.php?page=categories");
    exit();
}
?>