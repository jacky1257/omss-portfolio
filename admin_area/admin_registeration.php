<!--include connection-->
<?php
include('../includes/connect.php');
include('../function/common_function.php');
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
    <h2>Admin Registration</h2>

    <div class="container">
        <img src="../adminregis.png" alt="Admin Registration">
        <form action="" method="post" name="admin_registration_form">
            <label for="username">Username</label>
            <input type="text" id="admin_username" name="admin_username" placeholder="Enter Your Name" required="required">

            <label for="email">Email</label>
            <input type="email" id="admin_email" name="admin_email" placeholder="Enter Your Email" required="required">

            <label for="password">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter Your Password" required="required">

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password" required="required">

            <div>
                <input type="submit" name="admin_registration" value="Register">
            </div>
            <p>Do you have an account? <a href="admin_login.php">Login</a></p>
        </form>
    </div>
</body>
</html>


<!--check condition--> 
<?php 
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];


//select query
$select_query="SELECT * FROM `admin_table` WHERE admin_name='$admin_username' OR admin_email='$admin_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('Username and Email already exist')</script>";
}else if($admin_password!=$confirm_password){
    echo "<script>alert('Password do not match')</script>";
}else{
    //insert query (insert the data into database)
$insert_query="INSERT INTO `admin_table` (admin_name,admin_email,admin_password) VALUES ('$admin_username','$admin_email','$hash_password')";
$sql_execute=mysqli_query($con,$insert_query);

echo "<script>alert('Register Successfully')</script>";
echo "<script>window.open('admin_login.php','_self')</script>";

}







}

