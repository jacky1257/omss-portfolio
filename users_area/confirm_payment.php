<?php

// Include necessary files for database connection
include('../includes/connect.php');
session_start();

// Check if order_id is present in the URL parameters
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    
    // Fetch order details based on order_id
    $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    // Extract relevant information from the fetched row
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

// Check if the payment confirmation form is submitted
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    // Insert payment details into 'user_payments' table
    $insert_query="INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode)
    VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);

     // Display success alert and redirect to the profile page
    if($result){
        echo "<script>alert('Successfully Completed The Payment')</script>";
        echo "<script>window.open('profil.php?my_orders','_self')</script>";
    }

    // Update order status to 'Complete'
    $update_orders="UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <style>
        h1 {
            text-align: center;
        }

        div {
            text-align: center;
            padding: 10px;
        }

        form {
            width: 300px; /* Adjust the width as needed */
            margin: auto;
        }

        input, select {
            width: 100%;
            margin-bottom: 10px;
            height: 20px;
        }

        .amount_option {
            text-align: left;
        }
       
    </style>

</head>
<body>
    <h1>Confirm Payment</h1>
    <div>
        <form action="" method="post">
            <div>
                <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="amount_option">
            <label>Amount</label>
            <input type="text" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div>
            <select name="payment_mode">
                <option>Select Payment</option>
                <option>Paypal</option>
                <option>Cash On Delivery</option>
            </select>
            </div>
            <div>
                <input type="submit" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
