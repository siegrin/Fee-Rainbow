<?php
require_once 'app/models/products.php';

function Add($data)
{
    global $conn;
    return addProducts($conn, $data);
}

function Edit($data)
{
    global $conn;
    return editProducts($conn, $data);
}

function Delete($data)
{
    global $conn;
    return deleteProducts($conn, $data);
}

function upload()
{
    // Jika ada gambar hasil crop (base64)
    if (!empty($_POST['cropped_image'])) {
        return uploadWithCrop($_POST['cropped_image']);
    }

    // Upload biasa jika tidak ada crop
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    $namaFile = $_FILES['gambar']["name"];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, '../uploads/' . $namaFileBaru);

    return $namaFileBaru;
}

// Function baru untuk menyimpan gambar hasil crop
function uploadWithCrop($base64Image)
{
    $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
    $base64Image = str_replace(' ', '+', $base64Image);
    $imageData = base64_decode($base64Image);

    // Generate nama file unik
    $namaFileBaru = uniqid() . '.jpg';
    $filePath = '../uploads/' . $namaFileBaru;

    // Simpan gambar hasil crop ke folder uploads
    file_put_contents($filePath, $imageData);

    return $namaFileBaru;
}

function formatPrice($amount, $currency = 'Rp.')
{
    return $currency . ' ' . number_format($amount, 2, '.', ',');
}

?>