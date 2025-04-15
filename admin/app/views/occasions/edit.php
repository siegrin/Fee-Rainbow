<?php
require "app/controllers/OccasionController.php";

$id = $_GET["id"];
$occasions = query("SELECT * FROM occasions WHERE id =$id")[0];

if (isset($_POST["submit"])) {
  //ambil data dari tap elemen dalam form
  //cek apakah data berhasi di tambahkan atau tidak
  if (Edit($_POST) > 0) {
    echo "<script>
          alert('data berhasil diedit!');
          document.location.href = 'index.php?page=occasions';
          </script>";
  } else {
    echo "<script>
          alert('data gagal diedit!');
          document.location.href = 'index.php?page=occasions';
          </script>";
  }

}


?>
<!-- ===== FORM SECTION ===== -->
<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <input type="hidden" name="id" id="id" required value="<?= $occasions["id"]; ?>">
    <input type="text" id="name" name="name" value="<?= $occasions['name']; ?>" required
      placeholder="Change Occasion Name" autocomplete="off" class="form__input">
    <button type="submit" name="submit" class="form__button">
      Edit Occasion
    </button>
  </form>
</div>