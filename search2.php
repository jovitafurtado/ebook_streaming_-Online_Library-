
<?php
require_once('connection.php'); // Database connection

// Get parameters from the URL
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'suggestion';

if ($q !== '') {
    $q = strtolower($q); // Sanitize user input

    // Only consider the first character of the input for searching
    $firstLetter = substr($q, 0, 10);

    if ($type === 'suggestion') {
        // Search based on the first letter of the title, author, or category
        $sql = "SELECT title, author, category FROM books 
                WHERE LOWER(title) LIKE '$firstLetter%' 
                   OR LOWER(author) LIKE '$firstLetter%' 
                   OR LOWER(category) LIKE '$firstLetter%' 
                ORDER BY title ASC
                LIMIT 5";

        $result = $con->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['title']);
                $author = htmlspecialchars($row['author']);
                $category = htmlspecialchars($row['category']);
                // Display title and author on the same line
                echo "<div onclick=\"selectSuggestion('$title')\">$title by $author ($category)</div>";
            }
        } else {
            echo "<div>No search results found</div>";
        }

    } elseif ($type === 'search') {
        // Search based on the first letter of the title, author, or category
        $sql = "SELECT id, title, cover_image, author, category, description FROM books
                WHERE LOWER(title) LIKE '$firstLetter%' 
                   OR LOWER(author) LIKE '$firstLetter%' 
                   OR LOWER(category) LIKE '$firstLetter%'
                ORDER BY title ASC";

        $result = $con->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row['id']);
                $title = htmlspecialchars($row['title']);
                $image = htmlspecialchars($row['cover_image']);
                $author = htmlspecialchars($row['author']);
                $category = htmlspecialchars($row['category']);
                $description = htmlspecialchars($row['description']);

                // Display the book details including the image
                echo "<div class='book'>
                        <h2>Ebook Found</h2>
                        <h3>$title</h3>
                        <img src='$image'style='width: 200px; height: auto;' alt='$title cover' class='book-cover' />
                        <p><strong>Author:</strong> $author</p>
                        <p><strong>Genre:</strong> $category</p>
                        <p><strong>Description:</strong> $description</p>
                        <a class='button' onclick='readEbook($id)'>Read Now</a>
                      </div>";
            }
        } else {
            echo "<p>No results found</p>";
        }
    }

    if ($result) {
        $result->free();
    }
}
$con->close();
?>
