<?php
// Include the database connection file
require_once('connection.php');

// Check if `bookId` is provided
if (isset($_POST['bookId'])) {
   
    $bookId = (int)$_POST['bookId']; // Get the book ID from the POST request

    // Fetch the eBook link from the database
    $query = "SELECT ebook FROM books WHERE id = $bookId";
    $result = $con->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        $ebookLink = $row['ebook'];

        // Increment the view count
        $updateQuery = "UPDATE books SET view_count = view_count + 1 WHERE id = $bookId";
        $con->query($updateQuery);

        // Return the eBook link as JSON
        echo json_encode(['status' => 'success', 'ebookLink' => $ebookLink]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'eBook not found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No eBook specified.']);
}
?>
