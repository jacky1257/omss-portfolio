<?php 

// Check if 'edit_account' is set in the URL parameters
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);

    // Extract user information from the fetched row
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $email_id=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
// Check if the 'user_update' form is submitted
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];

         // Move the uploaded image to the 'user_images' directory
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        
        // Update user data in the database
        $update_data="UPDATE `user_table` SET username='$username',user_email='$user_email',
        user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' WHERE 
        user_id=$update_id";

        $result_query_update=mysqli_query($con,$update_data);
        // Display success alert and redirect to logout page
        if($result_query_update){
            echo "<script>alert('Data Updated Success')</script>";
            echo "<script>window.open('logout.php','_self')</script>";   
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_container input {
            
            margin: 10px;
            width: 70%;
        }

        input {
            height: 25px;
        } 

        h3 {
            padding: 10px;
        }

        .image {
            width: 15%;
            margin-right:50px ;
            border: grey 1px solid;
        }
        
    </style>
</head>
<body>
    <h3>Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="edit_container">
        <input type="text" value="<?php echo  $username ?>" name="user_username">
    </div>
    <div class="edit_container">
        <input type="email" name="user_email" value="<?php echo  $email_id ?>">
    </div>
    <div>
        <input style="margin-right:15px; padding:30px; " type="file" name="user_image">
        <img class="image" src="./user_images/<?php echo $user_image ?>">
    </div>
    <div class="edit_container">
        <input type="text" name="user_address" value="<?php echo  $user_address ?>">
    </div>
    <div class="edit_container">
        <input type="text" name="user_mobile" value="<?php echo  $user_mobile ?>">
    </div>

    <input type="submit" value="Update" name="user_update">
    </form>
</body>
</html>