<?php

// Fungsi mendapatkan semua Occasion
function getAllOccasions($limit, $offset, $search = '')
{
    $searchQuery = !empty($search) ? "WHERE name LIKE '%" . escape($search) . "%'" : "";
    return query("SELECT * FROM occasions $searchQuery ORDER BY id ASC LIMIT $limit OFFSET $offset");
}

// Fungsi menghitung total data Occasion
function getTotalOccasions($search = '')
{
    $searchQuery = !empty($search) ? "WHERE name LIKE '%" . escape($search) . "%'" : "";
    $result = query("SELECT COUNT(*) as total FROM occasions $searchQuery");
    return $result[0]['total'] ?? 0;
}

function addOccasion($conn, $data)
{
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "INSERT INTO occasions (name, created_at, updated_at) 
              VALUES ('$name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function editOccasion($conn, $data)
{
    global $conn;

    $id = $data["id"];
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "UPDATE occasions SET 
            name = '$name',
            updated_at = CURRENT_TIMESTAMP
            WHERE id = $id
            ";

    $result = mysqli_query(mysql: $conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    return mysqli_affected_rows($conn);
}

function deleteOccasion($conn, $id)
{
    global $conn; // Pastikan koneksi database tersedia

    // Pastikan ID valid dan aman dari SQL Injection
    $id = mysqli_real_escape_string($conn, (int) $id);
    if ($id <= 0) {
        return false;
    }

    $query = "DELETE FROM occasions WHERE id = $id";
    mysqli_query($conn, $query);

    // Periksa apakah ada kategori yang benar-benar terhapus
    return mysqli_affected_rows($conn) > 0;
}

function searchOccasion($conn, $keyword, $limit, $offset)
{
    global $conn;

    // Escape input untuk keamanan SQL Injection
    $keyword = escape($conn, $keyword);

    // Query mencari kategori yang sesuai dengan keyword
    $query = "SELECT id, name 
              FROM occasions
              WHERE name LIKE '%$keyword%'
              ORDER BY id ASC
              LIMIT $limit OFFSET $offset";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
}

?>