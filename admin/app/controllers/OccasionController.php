<?php
require_once 'app/models/occasions.php';
function Add($data)
{
    global $conn;
    return addOccasion($conn, $data);
}

function Edit($data)
{
    global $conn;
    return editOccasion($conn, $data);
}

function Delete($data)
{
    global $conn;
    return deleteOccasion($conn, $data);
}

?>