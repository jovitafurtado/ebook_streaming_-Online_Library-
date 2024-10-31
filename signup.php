<?php
require_once("connection.php");

if (isset($_POST['submit'])) 
{
    // Check if any required fields are empty
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['age']) || empty($_POST['Gender']) || empty($_POST['PhoneNumber']) || empty($_POST['password']) || empty($_POST['password1'])) 
    {
        echo 'Please fill in all the fields.';
    } 
    else 
    {
        // Collect form data
        $UserName = $_POST['name'];
        $UserUsername = $_POST['username'];
        $UserAge = $_POST['age'];
        $UserGender = $_POST['Gender'];
        $UserPhone = $_POST['PhoneNumber'];
        $UserPassword = $_POST['password'];
        $ConfirmPassword = $_POST['password1'];

        // Validate that both passwords match
        if ($UserPassword !== $ConfirmPassword)
        { echo "<script>
            alert( 'Passwords do not match.');
            window.location.href = 'signup.php'; // Redirect to login page
        </script>";
        }
        else 
        { 
            $checkQuery = "SELECT * FROM users WHERE username = '$UserUsername' OR phone_number = '$UserPhone' OR password='$UserPassword'";
            $checkResult = mysqli_query($con, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) 
            { echo "<script>
                alert( 'Username/Phone Number/Account/Password already exists. Try Again.');
                window.location.href = 'signup.php'; // Redirect to login page
            </script>";
            } 
            else 
            {
                // SQL query to insert the data into the users table
                $query = "INSERT INTO users (name, username, age, password, gender, phone_number) VALUES ('$UserName', '$UserUsername', '$UserAge', '$UserPassword', '$UserGender', '$UserPhone')";

                // Execute the query
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    echo "<script>
                    alert('Sign up successful!');
                    window.location.href = 'index.php'; // Redirect to login page
                </script>";
                } 
                else
                {
                    $error = 'Please check your query.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signing up here</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <style type="text/css">
        .container {
            padding: 10px auto;
            width: 50%;
            height: 200%;
            background-color: #FFE5B4;
            border-radius: 10px;
            margin: 250px auto;
        }

            .container h2 {
                text-align: center;
                color: black;
            }

            .container input[type="text"], .container input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 10px;
                color: darkslategray;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            .container input[type="submit"] {
                width: 100%;
                padding: 15px;
                background-color: #5c6bc0;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

                .container input[type="submit"]:hover {
                    background-color: #3949ab;
                }


        header {
            text-align: center;
            padding: 10px;
        }

            header nav a {
                margin: 0 15px;
                text-decoration: none;
                color: #5c6bc0;
            }

                header nav a:hover {
                    text-decoration: underline;
                }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to eBook Stream</h1>
        <p>Stream and read your favorite eBooks online anytime, anywhere</p>
    </header>

    <form action="signup.php" method="POST" onsubmit="return validate();">
        <div class="container">
            <h2>Sign up</h2>
            <p><label for="name">Name:</label><input type="text" id="name" name="name" required></p>

            <p><label for="username">Username:</label> <input type="text" id="username" name="username" required></p>

            <p><label for="age">Age:</label><input type="text" id="age" name="age" required> </p>

            <p><label for="password">Password:</label><input type="password" id="password" name="password" required></p>

            <p><label for="password1">Confirm Password:</label><input type="password" id="password1" name="password1" required></p>

            <label name="Gender:">Gender:</label>
            <select name="Gender">
                <option value="none">---Select Gender-----</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>

            <p><label for="PhoneNumber">Phone Number:</label><input type="text" id="PhoneNumber" name="PhoneNumber" required></p>

            <button type="submit" name="submit" value="submit">Submit</button>
            <button type="reset" value="Reset">Reset</button>
            <a href="index.php" style="font-size:1.5rem;"><br/>Back to login</a>
        </div>
       
    </form>

    <footer>
        <p>2024 eBook Stream | All Rights Reserved</p>
    </footer>
    <script type="text/javascript">

        function validate() {

            var nm = document.getElementById("name").value.trim();
            var nameRegex = /^[a-zA-Z\s]+$/;  // Allows only letters and spaces
            if (nm == "" || !nameRegex.test(nm) || nm.length > 25 || nm.length < 2) {
                alert("Please Enter a valid name with only letters and spaces, between 2-25 characters.");
                return false;
            }

            var uname = document.getElementById("username").value.trim();
            var usernameRegex = /^[a-zA-Z0-9]+$/;  // Allows only letters and numbers
            if (uname == "" || !usernameRegex.test(uname) || uname.length > 15 || uname.length < 2) {
                alert("Please enter a valid username with only letters and numbers, between 2-15 characters.");
                return false;
            }

            var age = document.getElementById("age");
            if (age.value == "") {
                alert("Please enter your age");
                return false;
            }
            if (isNaN(age.value) || age.value.length < 1 || age.value.length > 2) {
                alert("Age must be a number between 1 and 99");
                age.focus();
                return false;
            }

            var pass = document.getElementById("password");
            var pass1 = document.getElementById("password1")
            if (pass.value == "") {
                alert("Please enter your password");
                return false;
            }
            if (pass.value !== pass1.value) {
                alert("Passwords do not match");
                return false;
            }

            var gender = document.getElementsByName("Gender")[0];
            if (gender.value == "none") {
                alert("Please select your gender");
                return false;
            }

            var ph = document.getElementById("PhoneNumber");
            if (ph.value == "") {
                alert("Please enter your mobile no.");
                return false;
            }
            if (isNaN(ph.value) || ph.value.length != 10) {
                alert("mobile number must have 10 digits");
                ph.focus();
                return false;
            }


        }

    </script>
</body>
</html>
