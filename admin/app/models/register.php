<?php
function addUser($conn, $data)
{
    // Escape karakter berbahaya & sanitasi input
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $confirm_password = htmlspecialchars($data["confirm_password"]);


    // Validasi username (hanya huruf/angka, 3-20 karakter)
    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $username)) {
        echo "<script>alert('Username harus 3-20 karakter dan hanya boleh huruf/angka!');</script>";
        return false;
    }

    // Validasi password (6-20 karakter)
    if (strlen($password) < 6 || strlen($password) > 20) {
        echo "<script>alert('Password harus 6-20 karakter!');</script>";
        return false;
    }

    // Cek apakah password dan konfirmasi password sama
    if ($password !== $confirm_password) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    // Cek apakah username sudah ada
    $query = "SELECT id FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
        return false;
    }

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "INSERT INTO admin (username, password, created_at, updated_at) 
              VALUES ('$username', '$hashed_password', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}
?>