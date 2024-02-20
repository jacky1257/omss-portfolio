<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        h3 {
            color: red;
            padding: 15px;
        }

        .delete{
            display: inline;
            
        }

        input {
            width: 30%;
            margin: 20px;
            padding: 20px;
            transition: background-color 0.3s ease;
            border: none;
        }

        input:hover {
            background-color:#b7e954 ;
        }
    </style>
</head>
<body>
    <h3>Delete Account</h3>

    <form action="" method="post">
        <div class="delete"> 
            <input type="submit" name="delete" value="Delete Account">
        </div>
        <div class="delete"> 
            <input type="submit" name="dont_delete" value="Don't Delete Acoount">
        </div>

    </form>

    <?php

// Get the username from the session
$username_session=$_SESSION['username'];
// Check if the 'delete' button is clicked
if(isset($_POST['delete'])){

// Query to delete the user account based on the session username
$delete_query="DELETE FROM `user_table` WHERE username='$username_session'";
$result=mysqli_query($con,$delete_query);

// If deletion is successful, destroy the session and redirect to the index page
if($result){
session_destroy();
echo "<script>alert('Account Delete Seccessfully')</script>";
echo "<script>window.open('../index.php','_self')</script>";
}
 }

// Check if the 'dont_delete' button is clicked
if(isset($_POST['dont_delete'])){

// Redirect back to the profile page
echo "<script>window.open('profil.php','_self')";
    }
?>
</body>
</html>