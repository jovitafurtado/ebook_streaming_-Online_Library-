             
<?php
require_once("connection.php");

$successMessage = "";

if (isset($_POST['update'])) {
    $bookID = $_GET['ID']; // Get the book ID from the URL
    $cover = $_POST['cover_image'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $ebook = $_POST['ebook'];

    // Update the record
    $query = "UPDATE books SET cover_image='$cover', title='$title', author='$author', category='$category', description='$description', ebook='$ebook' WHERE id='$bookID'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $successMessage = "Book updated successfully!";
    } else {
        $successMessage = "Error updating book: " . mysqli_error($con);
    }
}

// Fetch existing book data for the form
if (isset($_GET['ID'])) {
    $bookID = (int)$_GET['ID']; // Ensure it's an integer
    $query = "SELECT * FROM books WHERE id = '$bookID'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $cover = $row['cover_image'];
        $title = $row['title'];
        $author = $row['author'];
        $category = $row['category'];
        $description = $row['description'];
        $ebook = $row['ebook'];
    } else {
        echo "Book not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Book</title>
</head>
<body>
<header>
    <h1>Welcome to eBook Stream</h1>
    <p>Stream and read your favorite eBooks online anytime, anywhere</p>
    <nav>
        <a href="admin.php">Home</a>
        <a href="logout.php" style="color:white; border: 2px solid transparent; border-radius: 5px; transition: all 0.3s ease;">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Update Book</h2>
<div class="featured-ebook">
    <?php if ($successMessage): ?>
        <div class="success-message"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>
        <h3>User ID: <?php echo htmlspecialchars($bookID); ?></h3>
        <p>Cover_image(URL):<?php echo htmlspecialchars($cover); ?></p>
        <p>Title:<?php echo htmlspecialchars($title); ?></p>
        <p>Author:<?php echo htmlspecialchars($author); ?></p>
        <p>Category:<?php echo htmlspecialchars($category); ?></p>
        <p>Description:<?php echo htmlspecialchars($description); ?></p>
        <p>Ebook Link(URL):<?php echo htmlspecialchars($ebook); ?></p>
</div>
<br/><a href="admin.php" style="font-size:1rem;">Back to Dashboard</a>
</div>
<footer>
    <p>&copy; 2024 Ebook Streaming. All Rights Reserved.</p>
</footer>
</body>
</html>

