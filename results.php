<?php
// results.php

// Simulated book data (you can replace this with a database in a real scenario)
$books = [
];

// Check if the 'query' parameter is set in the URL
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = strtolower(trim($_GET['query']));
    $results = [];

    // Search through the books array
    foreach ($books as $book) {
        if (strpos(strtolower($book['title']), $query) !== false || strpos(strtolower($book['author']), $query) !== false) {
            $results[] = $book;
        }
    }
} else {
    $query = '';
    $results = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .results {
            margin: 20px 0;
        }
        .book {
            padding: 10px;
            background-color: white;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
        .book h2 {
            margin: 0;
        }
        .book p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>

    <div class="results">
        <?php
        // Display the search results
        if (count($results) > 0) {
            foreach ($results as $book) {
                echo "<div class='book'>";
                echo "<h2>" . htmlspecialchars($book['title']) . "</h2>";
                echo "<p><strong>Author:</strong> " . htmlspecialchars($book['author']) . "</p>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($book['description']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found for <strong>" . htmlspecialchars($query) . "</strong>.</p>";
        }
        ?>
    </div>

    <p><a href="search.html">Go back to search</a></p>
</div>

</body>
</html>
