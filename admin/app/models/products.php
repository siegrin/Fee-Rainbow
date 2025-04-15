<?php

// Fungsi mendapatkan semua Occasion
function getAllProducts($limit, $offset, $search = '')
{
    $limit = (int) $limit;
    $offset = (int) $offset;

    // Query pencarian di beberapa kolom
    $searchQuery = !empty($search) ? "
        WHERE p.name LIKE '%" . escape($search) . "%'
           OR c.name LIKE '%" . escape($search) . "%'
           OR s.name LIKE '%" . escape($search) . "%'
           OR o.name LIKE '%" . escape($search) . "%'
    " : "";

    return query("
        SELECT p.id, p.name, p.price, 
               c.name AS category_name, 
               s.name AS subcategory_name, 
               o.name AS occasion_name 
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN subcategories s ON p.subcategory_id = s.id
        LEFT JOIN occasions o ON p.occasion_id = o.id
        $searchQuery 
        ORDER BY p.id ASC
        LIMIT $limit OFFSET $offset
    ");
}

// Fungsi menghitung total data produk (menyesuaikan dengan pencarian di atas)
function getTotalProducts($search = '')
{
    $searchQuery = !empty($search) ? "
        WHERE p.name LIKE '%" . escape($search) . "%'
           OR c.name LIKE '%" . escape($search) . "%'
           OR s.name LIKE '%" . escape($search) . "%'
           OR o.name LIKE '%" . escape($search) . "%'
    " : "";

    $result = query("
        SELECT COUNT(*) as total 
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN subcategories s ON p.subcategory_id = s.id
        LEFT JOIN occasions o ON p.occasion_id = o.id
        $searchQuery
    ");

    return $result[0]['total'] ?? 0;
}

function cleanCurrencyInput($price)
{
    $price = str_replace(["Rp", ".", ","], "", $price); // Hapus simbol mata uang dan pemisah ribuan
    return (int) $price; // Konversi ke integer
}

function addProducts($conn, $data)
{
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars(string: $data["name"]);
    $category_id = htmlspecialchars($data["category"]);
    $subcategory_id = htmlspecialchars($data["subcategory"]);
    $occasion_id = htmlspecialchars($data["occasion"]);
    $price = cleanCurrencyInput($_POST["price"]); // Bersihkan harga sebelum disimpan
    $description = nl2br(htmlspecialchars(mysqli_real_escape_string($conn, $data["description"]), ENT_QUOTES, 'UTF-8'));



    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "INSERT INTO products (name, category_id, subcategory_id, occasion_id, price, description, image, created_at, updated_at) 
             VALUES ('$name', '$category_id', '$subcategory_id', '$occasion_id', '$price', '$description', '$gambar',  CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, query: $query);

    // Cek apakah query berhasil atau tidak
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function editProducts($conn, $data)
{
    $id = $data["id"];
    // Escape karakter berbahaya & sanitasi input
    // Escape karakter berbahaya & sanitasi input
    $name = htmlspecialchars($data["name"]);
    $category_id = htmlspecialchars($data["category"]);
    $subcategory_id = htmlspecialchars($data["subcategory"]);
    $occasion_id = htmlspecialchars($data["occasion"]);
    $price = cleanCurrencyInput($_POST["price"]); // Bersihkan harga sebelum disimpan
    $description = nl2br(htmlspecialchars($data["description"]));
    $gambarlama = htmlspecialchars(string: $data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['image']['error'] === 4) {
        $gambar = $gambarlama;
    } else {

        //CHAT GPT tutorial
        if ($gambarlama) {
            $pathGambarLama = 'uploads/' . $gambarlama;
            if (file_exists($pathGambarLama)) {
                unlink($pathGambarLama);
            }
        }
        $gambar = upload();
    }

    // Query insert data dengan menyebutkan kolom yang diisi
    $query = "UPDATE products SET 
            name = '$name',
            category_id = '$category_id',
            subcategory_id = '$subcategory_id',
            occasion_id = '$occasion_id',
            price = '$price',
            image = '$gambar',
            description = '$description',
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

function deleteProducts($conn, $id)
{
    // Pastikan ID valid dan aman dari SQL Injection
    $id = mysqli_real_escape_string($conn, (int) $id);
    if ($id <= 0) {
        return false;
    }

    // Ambil nama file gambar sebelum menghapus produk
    $queryImage = "SELECT image FROM products WHERE id = $id";
    $resultImage = mysqli_query($conn, $queryImage);
    $row = mysqli_fetch_assoc($resultImage);

    if ($row) {
        $imagePath = "../uploads/" . $row["image"]; // Sesuaikan dengan folder penyimpanan gambar

        // Hapus file gambar jika ada
        if (!empty($row["image"]) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus produk dari database
        $queryDelete = "DELETE FROM products WHERE id = $id";
        mysqli_query($conn, $queryDelete);

        return mysqli_affected_rows($conn) > 0;
    }

    return false; // Jika produk tidak ditemukan
}
?>