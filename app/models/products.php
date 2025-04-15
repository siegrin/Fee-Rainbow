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
        SELECT p.id, p.name, p.price, p.image, 
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



?>