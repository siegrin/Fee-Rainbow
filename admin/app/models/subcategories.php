<?php

// Fungsi mendapatkan semua Occasion
function getAllSubCategories($id, $limit, $offset, $search = '')
{
    $searchQuery = !empty($search) ? "AND name LIKE '%" . escape($search) . "%'" : "";
    return query("
    SELECT * FROM subcategories
    WHERE category_id = $id
    $searchQuery 
    ORDER BY id ASC 
    LIMIT $limit OFFSET $offset");
}

// Fungsi menghitung total data SubCategories
function getTotalSubCategories($id, $search = '')
{
    $id = (int) $id;

    // Query pencarian
    $searchQuery = !empty($search) ? "AND name LIKE '%$search%'" : "";

    $query = "SELECT COUNT(*) as total FROM subcategories WHERE category_id = $id $searchQuery";
    $result = query($query);

    return $result[0]['total'] ?? 0;
}

function addSubCategories($conn, $data)
{
    $id = $_GET["id"];

    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "INSERT INTO subcategories (name, category_id, created_at, updated_at) 
              VALUES ('$name', '$id', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function editSubCategories($conn, $data)
{
    global $conn;

    $id = $data["id"];
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars(string: $data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "UPDATE subcategories SET 
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

function deleteSubCategories($conn, $id)
{
    global $conn; // Pastikan koneksi database tersedia

    // Pastikan ID valid dan aman dari SQL Injection
    $id = mysqli_real_escape_string($conn, (int) $id);
    if ($id <= 0) {
        return false;
    }

    $query = "DELETE FROM subcategories WHERE id = $id";
    mysqli_query($conn, $query);

    // Periksa apakah ada kategori yang benar-benar terhapus
    return mysqli_affected_rows($conn) > 0;
}
?>