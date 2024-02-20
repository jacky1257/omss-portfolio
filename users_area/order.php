<?php
// Include necessary files for database connection and common functions
include('../includes/connect.php');
include('../function/common_function.php');

// Check if user_id is present in the URL parameters
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    
}



//getting total item and total price of all item
// Get user's IP address
$get_ip_address=getIPAddress();

// Initialize variables
$total_price=0;

// Get total item count and total price of all items in the cart
$cart_query_price="SELECT * FROM `cart_details` WHERE 
ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand(); // Generate a random invoice number
$status='pending';

// Count the number of products in the cart
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    // Retrieve product details from the 'products' table
    $product_id=$row_price['product_id'];
    $select_product="SELECT * FROM `products` WHERE 
    product_id=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        // Calculate total price of all products
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}


//getting quantity from cart
$get_cart="SELECT * FROM `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
// Set default quantity and calculate subtotal
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

// Insert order details into 'user_orders' table
$insert_orders="INSERT INTO `user_orders` (user_id,amount_due,invoice_number,
total_products,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number
,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);

// Display success alert and redirect to the profile page
if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profil.php','_self')</script>";
}


//orders pending
// Insert pending order details into 'orders_pending' table
$insert_pending_orders = "INSERT INTO `orders_pending` 
(user_id,invoice_number,product_id,quantity,order_status) 
VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";

$result_pending_orders = mysqli_query($con,$insert_pending_orders);


// Delete items from the cart
$empty_cart="DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);


?>


