<?php 

    require_once("connection.php");
    $query = " select * from records ";
    $result = mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Records</title>
</head>
<body class="bg-dark">

        <div >
            <div >
                <div >
                    <div >
                        <table border="2">
                            <tr style="font-size:30px;color:darkblue;">
                                <!--<td > User ID </td>-->
                                <td> User Name </td>
                                <td> User Email </td>
                                <td> User Age </td>
                                <td> Actions</td>
                            </tr>

                            <?php 
                                    if($rowcount>0)
                                    {
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $UserID = $row['User_ID'];
                                        $UserName = $row['User_Name'];
                                        $UserEmail = $row['User_Email'];
                                        $UserAge = $row['User_Age'];
                            ?>
                                    <tr>
                                        <!--<td><?php echo $UserID ?></td>-->
                                        <td><?php echo $UserName ?></td>
                                        <td><?php echo $UserEmail ?></td>
                                        <td><?php echo $UserAge ?></td>
                                        
                                        <td><a href="delete.php?Del=<?php echo trim($UserID) ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                                }
                                else{

                            ?>                                                                    
                                   <tr>
                                    <br/>
                                    <br/>
                                   <td colspan="5" style="color:red;font-size:20px;"><center><b><h4>Sorry No Records To View</h4></b></center></td>
                                </tr>
                                   <?php 
                                    }  
                                    ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
