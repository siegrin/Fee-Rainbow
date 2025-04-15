<?php
require "app/controllers/SubCategoryController.php";



if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $subcategories = query("SELECT * FROM subcategories WHERE id = $id")[0];
    $category_id = $subcategories["category_id"];
    if (Delete($id)) {
        echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location.href='index.php?page=categories/subcategories&id=$category_id';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus kategori!');
            window.location.href='index.php?page=categories/subcategories&id=$category_id';
        </script>";
    }
} else {
    header("Location: index.php?page=categories");
    exit();
}
?>