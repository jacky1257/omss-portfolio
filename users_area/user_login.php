<?php
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

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
        <h2  class="title_registeration">User Login</h2>
        <div class="form_container">
            <form action="" method="post">
                <!--Username Field-->
                <div class="form_outline">
                    <label for="user_username">Username</label>
                    <input type="text" id="user_username" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
                </div>
                <!--Password Field-->
                <div class="form_outline">
                    <label for="user_password">Password</label>
                    <input type="password" id="user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                </div>
                <!--Submit button-->
                <div class="form_outline">
                    <input type="submit" value="Login" name="user_login" class="sub_btn">
                    <p>Don't have an account? <a href="user_registeration.php">Register Here</a></p>
                </div>
                


            </form>
        </div>
    </div>
</body>


</html>

<!--PHP CODE-->
<?php 
// Check if the login form is submitted
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    // Select user data from the database based on the provided username
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    //Fetch the data from  `cart_details` and display in cart item 
    $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    // Check if user data is found
    if($row_count>0){
        $_SESSION['username']=$user_username;

         // Verify the entered password with the hashed password stored in the database
        if(password_verify($user_password,$row_data['user_password'])){
            
            // Redirect to profile page if only one row is found
            if($row_count==1 ){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Succesfully')</script>";
                echo "<script>window.open('profil.php','_self')</script>";
            }
            else{
            // Redirect to payment page if multiple rows are found
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Succesfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
             // Display an error message for invalid credentials
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
         // Display an error message for invalid credentials
        echo "<script>alert('Invalid Credentials')</script>";
    }
}


?>