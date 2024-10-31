<?php

if (isset($_SESSION['success'])) {
    echo "<script>alert('" . $_SESSION['success'] . "');</script>";
    unset($_SESSION['success']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Stream and read eBooks online">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
    </script>
    <title>www.Bookstreaming.com</title>
    <style>
        body {
            background-size: 300%;
        }

        .featured-ebook {
            background-color: white;
            padding: 30px;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            max-width: 100%; /* Occupy full width of the container */
            text-align: left;
        }

            .featured-ebook h2 {
                margin-bottom: 15px;
            }

        .container {
            width: 90%; /* Make container full width */
            display: flex; /* Use flexbox */
            flex-wrap: wrap; /* Allow items to wrap to the next line */
            justify-content: space-between; /* Add space between items */
            gap: 20px; /* Gap between ebook boxes */
            margin-top: 250px;
        }

        .categories {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px auto;
        }

        .category {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            text-align: center;
            flex-basis: 22%;
            margin: 5px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

            .category:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

        @media (max-width: 768px) {
            .featured-ebook, .category {
                flex-basis: 100%;
                margin: 15px 0;
            }
        }


        .carousel {
            position: relative;
            width: 100%;
            max-width: 600px; /* Set a max-width */
            margin: auto;
            overflow: hidden; /* Hide overflowing reviews */
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .reviews {
            display: flex;
            transition: transform 0.5s ease; /* Smooth transition */
        }

        .review {
            min-width: 100%; /* Each review takes full width */
            padding: 20px;
            box-sizing: border-box; /* Includes padding in width */
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
        }

        .reviews {
            display: flex;
            transition: transform 0.5s ease; /* Smooth transition */
        }

        .review h3 {
            margin: 0;
            font-size: 1.5em;
        }

        .review p {
            margin: 5px 0;
            color: #555;
        }

        .rating {
            color: gold;
        }

        .button {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block; /* Makes the link behave like a button */
        }

            .button:hover {
                background-color: #5c6bc0; /* A lighter color on hover */
            }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Welcome to eBook Stream</h1>
        <p>Stream and read your favorite eBooks online anytime, anywhere</p>
        <nav>
            <a href="home.php">Home</a>
            <a href="search.html">Search</a>
            <a href="adminlog.html">Admin</a>
            <a href="contact.html">About us</a>
            <a href="logout.php" style="text-align=right; color:white; border: 2px solid transparent;border-radius: 5px;transition: all 0.3s ease;">Logout</a>
        </nav>
    </header>

    <!-- Featured eBook Section -->
    <div>
        <!-- Move the heading outside the flex container -->
        <div class="container" style="margin-top:300px">

            <left>
                <h1>
                    Latest Hot Picks<br />Your Reading Journey<br /> starts with us <br /><img src="ebook.gif" alt="A funny animation" style="width: 400px; height: auto;">
                </h1>
            </left>

            <div class="featured-ebook">
                <h2>Robinson Crusoe</h2>
                <img src="robin.jpg" style="width: 200px; height: auto;">
                <p><strong>Author:</strong> Daniel Defoe</p>
                <p><strong>Genre:</strong> Fiction</p>
                <p>Join our hero in a world of mystery, adventure, and epic journeys. Ready for a thrilling experience?</p>
                <a onclick="readEbook(4)" target="_blank" class="button">Read Now</a>
            </div>
            <div class="featured-ebook">
                <h2>The Art of Public Speaking</h2>
                <img src="dale.jpg" style="width: 200px; height: auto;">
                <p><strong>Author:</strong> Dale Breckenridge Carnegie</p>
                <p><strong>Genre:</strong> Non-Fiction</p>
                <p>"The Art of Public Speaking" is a book not for a seasoned public speaker. It can be an academic guide for aspiring public speakers. </p>
                <a onclick="readEbook(5)" target="_blank" class="button">Read Now</a>
            </div>
            <div class="featured-ebook">
                <h2>Pride and Prejudice</h2>
                <img src="pp.jpg" style="width: 200px; height: auto;">
                <p><strong>Author:</strong>Jane Austen</p>
                <p><strong>Genre:</strong>Romance</p>
                <p>A classical about life in the Eighteen Century rural England, exploring themes of love, social class, and misunderstandings.</p>
                <a onclick="readEbook(1)" target="_blank" class="button">Read Now</a>
            </div>

        </div>
    </div>

    <!-- Categories Section -->
    <div class="container" style="margin-top:-300px;scroll-margin-top:10px; position:relative;">

        <left><h2>Browse by Category</h2><img src="ebook3.gif" alt="A funny animation" style="width: 300px; height: auto;"></left>
        <div class="categories">

            <div class="category" id="category" onclick="location.href='search.html?category=Fiction'">
                <h3>Fiction</h3>
                <p>Explore thrilling tales and stories</p>
            </div>
            <div class="category" id="category"  onclick="location.href='search.html?category=Non-Fiction'">
                <h3>Non-Fiction</h3>
                <p>Dive into real stories and knowledge</p>
            </div>
            <div class="category" id="category" onclick="location.href='search.html?category=Romance'">
                <h3>Romance</h3>
                <p>Fall in love with captivating stories</p>
            </div>
            <div class="category" id="category"  onclick="location.href='search.html?category=Science%20Fiction'">
                <h3>Science Fiction</h3>
                <p>Discover futuristic adventures</p>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:-300px;scroll-margin-top:10px; position:relative;">
        <center><h1>Hear it from our Users...</h1><img src="ebook4.gif" alt="A funny animation" style="width: 600px; height: auto;"></center>
        <div class="carousel">
            <div class="reviews">
                <div class="review">
                    <h3>John Doe</h3>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <p>Amazing website! Highly recommend it.</p>
                </div>
                <div class="review">
                    <h3>Jane Smith</h3>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <p>Good value for money.</p>
                </div>
                <div class="review">
                    <h3>Michael Brown</h3>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <p>Absolutely love this site! It exceeded my expectations.</p>
                </div>
                <div class="review">
                    <h3>Linda Green</h3>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <p>Great quality ebooks! A must.</p>
                </div>
                <div class="review">
                    <h3>David Wilson</h3>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <p>The design is sleek and user-friendly.</p>
                </div>
                <div class="review">
                    <h3>Jessica Taylor</h3>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <p>Exceptional service and amazing site! Highly recommended.</p>
                </div>
                <div class="review">
                    <h3>Patricia Hernandez</h3>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <p>Simply fantastic! Will definitely recommend to my friends.</p>
                </div>
                <div class="review">
                    <h3>Sarah Gonzalez</h3>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <p>This is the best site I found this year!</p>
                </div>
                <div class="review">
                    <h3>Robert Rodriguez</h3>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <p>Very satisfied with the quality. Worth every penny!</p>
                </div>
                <div class="review">
                    <h3>Maria Johnson</h3>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <p>Solid performance and very reliable.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const reviews = document.querySelector('.reviews');
        const totalReviews = document.querySelectorAll('.review').length;
        let currentIndex = 0;

        function showReview(index) {
            const offset = -index * 100; // Calculate offset
            reviews.style.transform = `translateX(${offset}%)`; // Move reviews
        }

        function nextReview() {
            currentIndex = (currentIndex + 1) % totalReviews; // Loop back to first review
            showReview(currentIndex);
        }

        // Automatically swipe to the next review every 5 seconds
        setInterval(nextReview, 2000);

        // Start the automatic review swiping
        showReview(currentIndex); // Show the first review initially

        
        function readEbook(bookId) {
            $.ajax({
                type: 'POST',
                url: 'viewebook.php',
                data: { bookId: bookId },
                dataType: 'json',
                success: function (data) {
                    if (data.status === 'success') {
                        window.open(data.ebookLink, '_blank');
                    } else {
                        alert(data.message || "An error occurred while opening the eBook.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    alert("An unexpected error occurred.");
                }
            });
        }
         // When a category is clicked, this function navigates to search.php with the selected category as a parameter.
   

    </script>
   
    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 eBook Stream | All Rights Reserved</p>
    </footer>

</body>
</html>
