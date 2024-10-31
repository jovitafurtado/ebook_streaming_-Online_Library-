
<?php
require_once("connection.php");
$message = "";
$error = "";

if (isset($_POST['submit'])) {
    // Check if fields are filled
    if (empty($_POST['cover_image']) || empty($_POST['ebook']) || 
        empty($_POST['title']) || empty($_POST['author']) || 
        empty($_POST['description'])) {
        $error = 'Please fill in all the blanks.';
    } else {
        // Get the file paths from the input fields
        $cover_img = $_POST['cover_image'];
        $ebook = $_POST['ebook'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        // Check if the book already exists
        $checkQuery = "SELECT * FROM books WHERE title = '$title' AND author = '$author'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $error = 'Book already exists and cannot be added.';
        } else {
            // Direct SQL query (not recommended for production)
            $query = "INSERT INTO books (cover_image, title, author, category, description, ebook) 
                      VALUES ('$cover_img', '$title', '$author', '$category', '$description', '$ebook')";
            $result = mysqli_query($con, $query);

            if ($result) {
                $message = 'Book added successfully!';
            } else {
                $error = 'Please check your query.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" href="styles.css">
    <header>
        <h1>Welcome to eBook Stream</h1>
        <p>Stream and read your favorite eBooks online anytime, anywhere</p>
        <nav>
            <a href="admin.php">Home</a>
            <a href="logout.php" style="color:white; border: 2px solid transparent; border-radius: 5px; transition: all 0.3s ease;">Logout</a>
        </nav>
    </header>
    <script>
        function validateForm() {
            const coverImage = document.forms["bookForm"]["cover_image"].value;
            const ebook = document.forms["bookForm"]["ebook"].value;
            if (coverImage === "" || ebook === "") {
                alert("Please fill in all fields before submitting.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body >
<div class="container">
<div class="featured-book">
    <h2>Add New Book</h2>
    <form name="bookForm" method="post" action="addbook.php" onsubmit="return validateForm();">
        <input type="url" name="cover_image" placeholder="Cover Image Path (URL)" required><br>
        <input type="text" name="title" placeholder="Book Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
        <select name="category" required>
            <option value="">Select Category</option>
            <option value="Fiction">Fiction</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Romance">Romance</option>
            <option value="Science Fiction">Science Fiction</option>
        </select><br><br>
        <textarea name="description" placeholder="Description" required style="width: 400px; height: 150px;"></textarea><br>
        <input type="url" name="ebook" placeholder="Ebook Path (URL)" required><br>
        <button type="submit" name="submit">Add Book</button>
        <button type="reset" name="reset">Cancel</button> 
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <?php if (!empty($message)) echo "<p style='color:green; font-size:1.5rem'>$message</p>"; ?>
    </form>
    </div>
    <br/><a href="admin.php" style="font-size:1rem;">Back to Dashboard</a>
    </div>
    <footer>
        <p>&copy; 2024 Ebook Streaming. All Rights Reserved.</p>
    </footer>
</body>
</html>
