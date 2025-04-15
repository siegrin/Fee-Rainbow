<?php
function query($query): array {
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn)); // Menampilkan error SQL jika ada
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function escape($data) {
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

?>
