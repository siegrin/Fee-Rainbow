<?php
require_once 'app/models/register.php';
function Add($data)
{
    global $conn;
    return addUser($conn, $data);
}

?>