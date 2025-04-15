<?php
require_once 'app/models/subcategories.php';
function Add($data)
{
    global $conn;
    return addSubCategories($conn, $data);
}
function Edit($data)
{
    global $conn;
    return editSubCategories($conn, $data);
}
function Delete($data)
{
    global $conn;
    return deleteSubCategories($conn, $data);
}
?>