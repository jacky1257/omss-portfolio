<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <style>
        .container_pay {
            margin-left: 100px;
            display: flex;
            padding: 40px;
            
        }

        .container_pay img {
            width: 50%;
            height: 200px;
        }

        .container_pay a {
            text-align: center;
            border: solid;
            width: 50%;
            margin: 20px;
            padding: 50px;
            text-decoration: none;
        }

        .container_pay h2 {
            padding: 60px;
        }

        a {
            transition: transform 0.3s ease-in-out;
        }
        a:hover {
            background-color:  #ccff66;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<!--Php code to access user id-->
<?php 
$user_ip = getIPAddress();
$get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];

?>



<div>
    <h2 style="text-align: center; margin-left: 100px; padding: 20px;">Payment Option</h2>
    <div class="container_pay">
        <a href="https://www.paypal.com" target="_blank"><img src="../PayPal.png" alt=""></a>
        <a href="order.php?user_id=<?php echo isset($user_id) ? $user_id : ''; ?>"><h2>Cash On Delivery (COD)</h2></a>
    </div>
</div>
    
</body>
</html> 