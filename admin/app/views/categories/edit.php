<?php
require "app/controllers/CategoryController.php";

$id = $_GET["id"];
$categories = query("SELECT * FROM categories WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  //ambil data dari tap elemen dalam form
  //cek apakah data berhasi di tambahkan atau tidak
  if (Edit($_POST) > 0) {
    echo "<script>
          alert('data berhasil diedit!');
          document.location.href = 'index.php?page=categories';
          </script>";
  } else {
    echo "<script>
          alert('data gagal diedit!');
          document.location.href = 'index.php?page=categories';
          </script>";
  }

}


?>
<!-- ===== FORM SECTION ===== -->
<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <input type="hidden" name="id" id="id" required value="<?= $categories["id"]; ?>">
    <input type="text" id="name" name="name" value="<?= $categories['name']; ?>" required
      placeholder="Change Category Name" autocomplete="off" class="form__input">
    <button type="submit" name="submit" class="form__button">
      Edit Category
    </button>
  </form>
</div>