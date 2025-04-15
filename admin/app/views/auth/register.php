<?php
require_once 'app/controllers/RegisterController.php';
if (isset($_POST["register"])) {
    //ambil data dari tap elemen dalam form
    //cek apakah data berhasi di tambahkan atau tidak
    if (Add($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php?page=index.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php?page=index.php';
            </script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <!-- ===== BOX ICONS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Login</title>
    <link rel="stylesheet" href="public/assets/css/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <form action="" method="post" class="form">
            <h1 class="title">Register</h1>
            <div class="inputs">
                <div class="input__box">
                    <input type="text" name="username" id="username" placeholder="Username" spellcheck="false" required
                        autofocus class="input-field" maxlength="20">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input__box">
                    <input type="password" name="password" id="password" placeholder="Password" required
                        class="input-field" maxlength="20">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input__box">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                        required class="input-field" maxlength="20">
                    <i class='bx bx-lock-alt'></i>
                </div>
            </div>
            <button type="submit" name="register" class="btn">Register</button>
            <div class="register">
                have an account? <a href="index.php?page=login">Login</a>
            </div>
        </form>
    </div>
</body>
<script>
    function validateForm() {
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        let usernameRegex = /^[a-zA-Z0-9]{5,20}$/;
        let passwordRegex = /^[a-zA-Z0-9]{6,20}$/;

        if (!usernameRegex.test(username)) {
            alert("Username harus 5-20 karakter dan tanpa simbol khusus!");
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert("Password harus 6-20 karakter dan tanpa simbol khusus!");
            return false;
        }

        return true;
    }
</script>

</html>