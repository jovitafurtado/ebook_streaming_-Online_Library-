
<?php
require_once("connection.php");
session_start();

$error = ''; // Initialize error variable

if (isset($_POST['submit'])) {
    // Check if username and password are filled
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "<script>
        alert( 'Please Fill the blanks.');
        window.location.href = 'signup.php'; // Redirect to login page
    </script>";
    } else {
        // Escape input to prevent issues
        $username = mysqli_real_escape_string($con, trim($_POST['username']));
        $password = trim($_POST['password']);

        // Query to find the user
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] = $username; // Start session if user is found
                echo "<script>
                alert( 'Welcome,$username.....');
                window.location.href = 'home.php'; // Redirect to login page
            </script>";
                exit;
            } else {echo "<script>
                alert( 'Username/Password  is invalid or User does not exist');
                window.location.href = 'index.php'; // Redirect to login page
            </script>";
            }
        } else {
            $error = "Database Error.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.BookStream.com</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to eBook Stream</h1>
        <p>Stream and read your favorite eBooks online anytime, anywhere</p>
    </header>
    <div class="container" style="height:150%;">
        <div id="login-section" class="input">
            <h2>Sign In</h2>
            <form id="login-form" action="index.php" method="POST">
                <input type="text" id="uname" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" name="submit">Sign In</button>
                <button type="reset" name="reset">Cancel</button>
            </form>
            <a href="signup.php">Don't have an account? Sign up here</a>
            <br /><br /><a href="adminlog.html">Admin? Click here</a>
        </div>
    </div>
    <!-- Footer Section -->
    <footer>
        <p>2024 eBook Stream | All Rights Reserved</p>
    </footer>
</body>
</html>
