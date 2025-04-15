<?php
require "app/controllers/SubCategoryController.php";

$id = $_GET["id"];
if (isset($_POST["submit"])) {
  //ambil data dari tap elemen dalam form
  //cek apakah data berhasi di tambahkan atau tidak
  if (Add($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'index.php?page=categories/subcategories&id=$id';
          </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php?page=categories/subcategories&id=$id';
          </script>";
  }

}

?>

<!-- ===== FORM SECTION ===== -->
<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <input type="text" id="name" name="name" required placeholder="Input SubCategory Name" class="form__input">
    <button type="submit" name="submit" class="form__button">
      Add SubCategory
    </button>
  </form>
</div>