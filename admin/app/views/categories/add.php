<?php
require "app/controllers/CategoryController.php";

if (isset($_POST["submit"])) {
  //ambil data dari tap elemen dalam form
  //cek apakah data berhasi di tambahkan atau tidak
  if (Add($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'index.php?page=categories';
          </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php?page=categories';
          </script>";
  }

}

?>

<!-- ===== FORM SECTION ===== -->
<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <input type="text" id="name" name="name" required placeholder="Input Category Name" class="form__input">
    <button type="submit" name="submit" class="form__button">
      Add Category
    </button>
  </form>
</div>

<div class="form__container">
  <form action="#" class="form" id="contact-form" method="post">
    <h1 class="login__title">Login</h1>
    <div class="login__inputs">
      <div class="login__box">
        <input type="text" id="name" name="name" required placeholder="Username" class="form__input">
      </div>
      <div class="login__box">
        <input type="text" id="name" name="name" required placeholder="Username" class="form__input">
      </div>

      <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

      <button type="submit" name="submit" class="form__button">Add Category</button>
      <div class="login__register">
        Don't have an account? <a href="registration.html">Register</a>
      </div>
    </div>
  </form>
</div>