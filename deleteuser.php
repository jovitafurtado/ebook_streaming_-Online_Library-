<?php
require_once("connection.php");

if (isset($_GET['Del'])) {
    $userId = (int)$_GET['Del'];

    $query = "DELETE FROM users WHERE id = $userId"; 
    $result = $con->query($query);
    
    if ($result) {
        header("Location: admin.php");
    } else {
        echo 'Please check your query';
    }
} else {
    header("Location: admin.php");
}
?>

