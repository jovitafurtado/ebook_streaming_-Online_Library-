<?php
require_once("connection.php");

if (isset($_GET['Del'])) {
    $bookId = (int)$_GET['Del'];

    $query = "DELETE FROM books WHERE id = $bookId"; 
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

