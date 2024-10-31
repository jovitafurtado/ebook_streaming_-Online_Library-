<?php 
require_once("connection.php");

$UserID = (int)$_GET['GetID']; // Ensure it's an integer to prevent SQL injection
$query = "SELECT * FROM books WHERE id = '$UserID'";
$result = mysqli_query($con, $query);


if ($row = mysqli_fetch_assoc($result)) {
    $bookID = $row['id'];
    $cover = $row['cover_image'];
    $title = $row['title'];
    $author = $row['author'];
    $category = $row['category'];
    $description = $row['description'];
    $ebook = $row['ebook'];
    $view = $row['view_count'];
    
} else {
    // Handle case where no book is found
    echo "Book not found.";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Update Form</title>
    
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
            <form action="update.php?ID=<?php echo trim($bookID) ?>" method="post">
                <h3>User Id: <?php echo $bookID; ?></h3>
                <input type="text" name="cover_image" placeholder="Cover Image Path (URL)" value="<?php echo $cover; ?>" required><br>
                <input type="text" name="title" placeholder="Book Title" value="<?php echo $title; ?>" required><br>
                <input type="text" name="author" placeholder="Author" value="<?php echo $author; ?>" required><br>
                <select name="category" required>
   			<option value="" disabled>Select Category</option>
    			<option value="fiction" <?php echo ($category === "fiction") ? 'selected' : ''; ?>>Fiction</option>
    			<option value="non-fiction" <?php echo ($category === "non-fiction") ? 'selected' : ''; ?>>Non-Fiction</option>
   			<option value="romance" <?php echo ($category === "romance") ? 'selected' : ''; ?>>Romance</option>
    			<option value="science fiction" <?php echo ($category === "science fiction") ? 'selected' : ''; ?>>Science Fiction</option>
		</select>
                <br/><br/>
                <textarea name="description" placeholder="Description" style="width: 250px; height: 100px;" required><?php echo htmlspecialchars($description); ?></textarea><br>
                <input type="text" name="ebook" placeholder="Ebook Path (URL)" value="<?php echo $ebook; ?>" required><br>
                <button type="submit" name="update">Update</button>
                <button type="reset" name="reset">Cancel</button>
            </form>
        </div>
        <br/><a href="admin.php" style="font-size:1rem;">Back to Dashboard</a>
    </div>
    <br/><a href="admin.php" style="font-size:1rem;">Back to Dashboard</a>
    <footer>
        <p>&copy; 2024 Ebook Streaming. All Rights Reserved.</p>
    </footer>
</body>
</html>
