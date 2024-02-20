<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>

    <style>
        .title_registeration {
            text-align: center;
            color: #ace600;
            background-color: #fff;
            width: 50%;
            margin: 0 auto;
            border-radius: 20px;
        }

        .form_pro {
      text-align: center;
      padding: 20px;
    }

    .form_outline {
      margin: 0 auto;
      text-align: left;
      max-width: 500px;
      padding: 5px;
     
    }

    .form_outline label {
        display: block;
        margin-bottom: 2px;
        padding: 5px;
        
    }

    .form_outline input {
      width: 100%;
      padding: 8px;
      border: none;
    }

    .sub_btn {
  display: block;
  margin-top: 10px;
  margin-left: 9px; 
  padding: 15px;
  
  border-radius: 10px;
  transition: background-color 0.8s ease;
  border: none;
}

.sub_btn:hover {
  background-color: #ace600;
  color: white;
}
footer {
    text-align: center;
    background-color: #fff;
    
}
    </style>
</head>
<body style="background-color: #d8dde6;">
    <div class="form_pro">
        <h2  class="title_registeration">New User Registeration</h2>
        <div class="form_container">
            <form action="" method="post" enctype="multipart/form-data">
                <!--Username Field-->
                <div class="form_outline">
                    <label for="user_username">Username</label>
                    <input type="text" id="user_username" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
                </div>
                <!--Email Field-->
                <div class="form_outline">
                    <label for="user_email">Email</label>
                    <input type="text" id="user_email" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                </div>
                <!--User Image-->
                <div class="form_outline">
                    <label for="user_image">User Image</label>
                    <input type="file" id="user_image" required="required" name="user_image">
                </div>
                <!--Password Field-->
                <div class="form_outline">
                    <label for="user_password">Password</label>
                    <input type="password" id="user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                <!--Confirm Password Field-->
                <div class="form_outline">
                    <label for="conf_user_password">Confirm Password</label>
                    <input type="password" id="conf_user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="conf_user_password">
                </div>
                <!--Address Field-->
                <div class="form_outline">
                    <label for="user_address">Address</label>
                    <input type="text" id="user_address" placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                </div>
                 <!--Contact Field-->
                 <div class="form_outline">
                    <label for="user_contact">Contact</label>
                    <input type="text" id="user_contact" placeholder="Enter Your Mobile Number" autocomplete="off" required="required" name="user_contact">
                </div>

                <div class="form_outline">
                    <input type="submit" value="Register" name="user_register" class="sub_btn">
                    <p>Already have an account? <a href="user_login.php">Login</a></p>
                </div>
                


            </form>
        </div>
    </div>
</body>
<footer>
<?php
include("../includes/footer.php")
?>
</footer>
</html>


<!--Php code-->
<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

//select query
$select_query="SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('Username and Email already exist')</script>";
}else if($user_password!=$conf_user_password){
    echo "<script>alert('Password do not match')</script>";
}

else{
    //insert query (insert the data into database)
move_uploaded_file($user_image_tmp,"./user_images/$user_image");
$insert_query="INSERT INTO `user_table` (username,user_email,user_password,user_image,	
user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password',
'$user_image',' $user_ip','$user_address','$user_contact')";
$sql_execute=mysqli_query($con,$insert_query);

}

//selecting cart items
$select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$row_count=mysqli_num_rows($result_cart);
if($row_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else {
    echo "<script>window.open('../index.php','_self')</script>";
}
}



?>