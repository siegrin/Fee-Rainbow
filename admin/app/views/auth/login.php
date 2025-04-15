<?php
require_once 'app/controllers/AuthController.php';
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
            <h1 class="title">Login</h1>
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
            </div>
            <div class="options">
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" class="checkbox__input" id="user-check">
                    <label for="user-check" class="checkbox__label">Remember me</label>
                </div>

                <a href="#" class="link">Forgot Password?</a>
            </div>
            <button type="submit" name="login" class="btn">Login</button>
            <div class="register">
                Don't have an account? <a href="index.php?page=register">Register</a>
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