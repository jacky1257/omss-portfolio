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
    <title>Admin Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            margin: 50px auto;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            width: 50%;
            border-right: 1px solid #ddd;
        }

        form {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Admin Login</h2>

    <div class="container">
        <img src="../adminregis.png" alt="Admin Registration">
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" id="admin_username" name="admin_username" placeholder="Enter Your Name" required="required">

            <label for="password">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter Your Password" required="required">

            <div>
                <input type="submit" name="admin_login" value="Login">
            </div>
            <p>Don't you have an account? <a href="admin_registeration.php">Register</a></p>
        </form>
    </div>
</body>
</html>


<?php 
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['admin_username'];
    $admin_password=$_POST['admin_password'];

    $select_query="SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    


    


    if($row_count>0){
        $_SESSION['admin_name']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
            //echo "<script>alert('Login Succesfully')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['admin_name']=$admin_username;
                echo "<script>alert('Login As Admin Succesfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                $_SESSION['admin_name']=$$admin_username;
                echo "<script>alert('Login As Admin Succesfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}


?>