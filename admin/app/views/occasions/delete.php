<?php
require "app/controllers/OccasionController.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (Delete($id)) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href='index.php?page=occasions';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data!');
            window.location.href='index.php?page=occasions';
        </script>";
    }
} else {
    header("Location: index.php?page=occasions");
    exit();
}
?>