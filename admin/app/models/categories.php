<?php

// Fungsi mendapatkan semua Occasion
function getAllCategories($limit, $offset, $search = '')
{
    $searchQuery = !empty($search) ? "WHERE c.name LIKE '%" . escape($search) . "%'" : "";
    return query("
    SELECT c.id, c.name, COUNT(s.id) AS total_subcategories
      FROM categories c
      LEFT JOIN subcategories s ON c.id = s.category_id
    $searchQuery 
      GROUP BY c.id
      ORDER BY c.id ASC
    LIMIT $limit OFFSET $offset");
}

// Fungsi menghitung total data Occasion
function getTotalCategories($search = '')
{
    $searchQuery = !empty($search) ? "WHERE name LIKE '%" . escape($search) . "%'" : "";
    $result = query("SELECT COUNT(*) as total FROM categories $searchQuery");
    return $result[0]['total'] ?? 0;
}

function addCategories($conn, $data)
{
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "INSERT INTO categories (name, created_at, updated_at) 
              VALUES ('$name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function editCategories($conn, $data)
{
    $id = $data["id"];
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "UPDATE categories SET 
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

function deleteCategories($conn, $id)
{
    // Pastikan ID valid dan aman dari SQL Injection
    $id = mysqli_real_escape_string($conn, (int) $id);
    if ($id <= 0) {
        return false;
    }

    // Hapus semua subkategori yang terkait
    $query_sub = "DELETE FROM subcategories WHERE category_id = $id";
    mysqli_query($conn, $query_sub);

    // Hapus kategori utama
    $query = "DELETE FROM categories WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada baris yang terhapus
    return mysqli_affected_rows($conn) > 0;
}

function searchCategories($conn, $keyword, $limit, $offset)
{
    // Escape input untuk keamanan SQL Injection
    $keyword = escape($conn, $keyword);

    // Query mencari kategori yang sesuai dengan keyword
    $query = "SELECT c.id, c.name, COUNT(s.id) AS total_subcategories
              FROM categories c
              LEFT JOIN subcategories s ON c.id = s.category_id
              WHERE c.name LIKE '%$keyword%'
              GROUP BY c.id
              ORDER BY c.id ASC
              LIMIT $limit OFFSET $offset";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    return $categories;
}

?>