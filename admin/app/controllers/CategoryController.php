<?php
require_once 'app/models/categories.php';

function Add($data)
{
    global $conn;
    return addCategories($conn, $data);
}

function Edit($data)
{
    global $conn;
    return editCategories($conn, $data);
}

function Delete($data)
{
    global $conn;
    return deleteCategories($conn, $data);
}

function search($data)
{
    global $conn;
    return searchCategories($conn, $data);
}

?>