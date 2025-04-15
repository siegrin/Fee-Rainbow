<?php
require "app/controllers/SubCategoryController.php";

$id = $_GET["id"];
$subcategories = query("SELECT * FROM subcategories WHERE id = $id")[0];
$category_id = $subcategories["category_id"];

if (isset($_POST["submit"])) {
  //ambil data dari tap elemen dalam form
  //cek apakah data berhasi di tambahkan atau tidak
  if (Edit($_POST) > 0) {
    echo "<script>
          alert('data berhasil diedit!');
          document.location.href = 'index.php?page=categories/subcategories&id=$category_id';
          </script>";
  } else {
    echo "<script>
          alert('data gagal diedit!');
          document.location.href = 'index.php?page=categories/subcategories&id=$category_id';
          </script>";
  }

}


?>
<!-- ===== FORM SECTION ===== -->
<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <input type="hidden" name="id" id="id" required value="<?= $subcategories["id"]; ?>">
    <input type="text" id="name" name="name" value="<?= $subcategories['name']; ?>" required
      placeholder="Change SubCategory Name" autocomplete="off" class="form__input">
    <button type="submit" name="submit" class="form__button">
      Edit Category
    </button>
  </form>
</div>