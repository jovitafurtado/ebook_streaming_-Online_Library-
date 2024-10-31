<?php
require_once("connection.php");
$query = "SELECT * FROM books";
$result = mysqli_query($con, $query);
$rowcount = mysqli_num_rows($result);

$query1 = "SELECT * FROM users";
$result1 = mysqli_query($con, $query1);
$rowcount1 = mysqli_num_rows($result1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
       .featured-ebook
       { width:70%;}
       </style>
    <title>Admin Dashboard</title>
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

    <div class="container" style="width:80%">
        <center>
            <h1>Welcome to the Admin Dashboard</h1>
            <h2>Management System</h2>
        </center>

        <!-- eBook Management Section -->
        <section id="ebooks">
            <h3>Ebook Management</h3>
            <center>
                <div class="featured-ebook" >
                    <h3>Ebook List</h3>
                    <table border="1">
                        <tr>
                            <th>Serial No.</th>
                            <th>Book Id</td>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>View Book</th>
                            <th>View Count</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($rowcount > 0) {
                            $serial = 1; // Initialize the serial number
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $image = $row['cover_image'];
                                $title = $row['title'];
                                $author = $row['author'];
                                $cat = $row['category'];
                                $description = $row['description'];
                                $pdf = $row['ebook']; // PDF link
                                $view = $row['view_count'];
                        ?>
                        <tr>
                            <td><?php echo $serial++; ?></td> 
                            <td><?php echo $id;?></td>
                            <td><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" style="width: 50px; height: auto;"></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $cat; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><a href="<?php echo $pdf; ?>" target="_blank">View</a></td>
                            <td><?php echo $view; ?></td>
                            <td>
                                <a href="edit.php?GetID=<?php echo trim($id); ?>">Edit</a>
                                <a href="delete.php?Del=<?php echo trim($id); ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="10" style="color:red;font-size:20px;">
                                <center><h4 style="font-weight:bolder">Sorry, No Records To View</h4></center>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br/><br/><a href="addbook.php">Add Books</a>
                </div>
            </center>
        </section>

        <!-- User Management Section -->
        <section id="users">
            <h3>User Management</h3>
            <center>
                <div class="featured-ebook">
                    <h3>User List</h3>
                    <table border="1">
                        <tr>
                            <th>Serial No.</th>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Age</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Joined at</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($rowcount1 > 0) {
                            $serial1 = 1; // Initialize the serial number for users
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $id = $row1['id'];
                                $name = $row1['name'];
                                $uname = $row1['username'];
                                $age = $row1['age'];
                                $pswd = $row1['password'];
                                $gender = $row1['gender'];
                                $phno = $row1['phone_number'];
                                $join = $row1['created_at'];
                        ?>
                        <tr>
                            <td><?php echo $serial1++; ?></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $uname; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $pswd; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $phno; ?></td>
                            <td><?php echo $join; ?></td>
                            <td>
                                <a href="delete.php?Del=<?php echo trim($id); ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="10" style="color:red;font-size:20px;">
                                <center><h4 style="font-weight:bolder">Sorry, No Records To View</h4></center>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </center>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Ebook Streaming. All Rights Reserved.</p>
    </footer>
</body>
</html>
