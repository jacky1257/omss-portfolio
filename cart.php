<?php
include('includes/connect.php');
include('function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediPharma</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="myscript.js"></script>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <h5>Medi<span>Pharma</span></h5>
        </div>

  

    <ul class="nav-links">
    <?php 
    if(!isset($_SESSION['username'])){
        echo "<li>
        <a href='index.php'>
            <span>Hello Guest</span>
        </a>
    </li>";
    }else{
        echo "<li>
        <a href='#'>
            <span>Welcome ".$_SESSION['username']."</span>
        </a>
    </li>";
    }
        if(!isset($_SESSION['username'])){
            echo "<li>
            <a href='./users_area/user_login.php'>
                <i class='fa-solid fa-arrow-right-from-bracket'></i>
                <span>Login</span>
            </a>
        </li>";
        }else{
            echo "<li>
            <a href='./users_area/logout.php'>
                <i class='fa-solid fa-arrow-right-from-bracket'></i>
                <span>Logout</span>
            </a>
        </li>";
        }
        ?>
        <li>
            <a href="index.php">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="display_all.php">
                <i class="fa-solid fa-comments"></i>
                <span>Products</span>
                </a>
        </li>
        <li>
            <a href="./users_area/user_registeration.php">
                <i class="fa-solid fa-sliders"></i>
                <span>Register</span>
                </a>
        </li>
        <li>
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i><sup><?php
                cart_item();?></sup>
               
            </a>
        </li>
        
    </ul>

<!-- Side Nav Category Display (Using Function) -->
<div class="drop">
  <button onclick="toggleDropdown()" class="dropbtn">Categories</button>
  <div id="categories" class="dropdown-content">
    <a href="#"><?php getCategories(); ?></a>
  </div>
</div>


<!-- Side Nav Brands Display (Using Function) -->
<div class="drop">
<button onclick="myFunction2()" class="dropbtn">Brands</button>
<div id="brands" class="dropdown-content">
<a href="#"><?php getBrands(); ?></a>
</div>
        
</nav>

<!--Calling cart function-->
<?php
cart()
?>

   
<!--Cart Table-->
<form action="" method="post">
<table class="table_container">
   
    <!--Php code to display dynamic data-->
    <?php 
    //accessing ip address and store in $get_ip_add 
    $get_ip_add = getIPAddress();  
    $total_price=0; //set the price  
    // Query to select all rows from the 'cart_details' table where the IP address matches the user's IP address
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    // Count the number of rows returned by the query
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
    // Display table header if there are items in the cart
        echo " <tr>
        <th>Product title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operation</th>
    </tr>";
    while($row=mysqli_fetch_array($result)){
        // Get the product ID from the current row in the 'cart_details' table
        $product_id=$row['product_id'];

        // Query to select all details of the product from the 'products' table based on the product ID
        $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_product=mysqli_query($con,$select_products);

        // Loop through the result set of the product details
        while($row_product_price=mysqli_fetch_array($result_product)){

        // Get and store various details of the product
        $product_price=array($row_product_price['product_price']); //store the products cart
        $price_table=$row_product_price['product_price'];
        $product_title=$row_product_price['product_title'];
        $product_image1=$row_product_price['product_image1'];
        $product_values=array_sum($product_price);  // Calculate the total price for the quantity
        $total_price+=$product_values;  // Accumulate the total price for all products in the cart
        
    ?>
    <tr>
        <!--Display Product Title-->
        <td><?php echo $product_title ?></td>
         <!--Display Product Image-->
        <td><img src= admin_area/product_images/<?php echo $product_image1?> alt="" class="cart_img"></td>
        <!-- Input field for updating quantity -->
        <td><input type="text" name="qty" id="" style="width:70px;"></td>



            <?php 
            // Get the user's IP address
            $get_ip_add = getIPAddress();

                 // Check if the 'update_cart' button is clicked
                if(isset($_POST['update_cart'])){

                    // Get the quantity value from the submitted form
                    $quantities=$_POST['qty'];

                    // Update the quantity in the 'cart_details' table based on the user's IP address
                    $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                    $result_products_quantity = mysqli_query($con, $update_cart);

                    // Update the total price based on the new quantity
                    $total_price=$total_price*$quantities;
                }
            ?>

        <!-- Display product price -->
        <td>RM: <?php echo $price_table ?>/-</td>
         <!-- Checkbox for removing the item -->
        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" ></td>
        <td>
        <!-- Update Cart button -->
        <input type="submit" value="Update Cart" name="update_cart">
        <!-- Remove Cart button -->
        <input type="submit" value="Remove Cart" name="remove_cart">
        </td>
    </tr>
<?php 
    }
 }
}

else{
    // Display an alert and a message if the cart is empty
    echo "<script>alert('Cart is Empty')</script>";
    echo "<h2 style='text-align:center; color:red; margin-left: 200px; padding:5%; '>Cart is Empty</h2>";
}
 ?>


</table>
<!--Subtotal-->
<div style="text-align: center;">

<?php 
// Get the user's IP address
$get_ip_add = getIPAddress();  //accessing ip address and store in $get_ip_add
// Query to select all rows from the 'cart_details' table where the IP address matches the user's IP address
$cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
// Count the number of rows returned by the query
$result_count=mysqli_num_rows($result);
// Display different content based on whether there are items in the cart or not
if($result_count>0){
     // Display subtotal, 'Continue Shopping' button, and 'Check Out' button if there are items in the cart
    echo "<h4>Subtotal: <strong style='color:rgba(53, 227, 14, 0.989)'>RM: $total_price</strong></h4>
    <input type='submit' value='Continue Shopping' name='continue_shopping' style='padding: 10px;'>
    <button style='padding: 10px; margin: 10px;'><a href='./users_area/checkout.php' style='text-decoration:none;'>Check Out</a></button>";
} else {
     // Display 'Continue Shopping' button if the cart is empty
    echo "<input type='submit' value='Continue Shopping' name='continue_shopping' style='margin-left:200px; padding:20px; margin-bottom:5px;'>";
}
// If 'Continue Shopping' button is clicked, redirect to the index page
if(isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
}
// If 'Update Cart' button is clicked, call the remove_cart_item function
if (isset($_POST['update_cart'])) {
    echo $remove_item = remove_cart_item();
}
?>
    </div>

</form>

<?php 
// Function to remove items from the cart
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            //echo $remove_id;
            // Delete the selected item from the cart
            $delete_quety="DELETE FROM `cart_details` WHERE product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_quety);


            if($run_delete){
                // Refresh the cart page after removing the item
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

// Display the total price and options
echo $remove_item= remove_cart_item();
?>





</body>

<!--calling footer.php-->
<?php
include("./includes/footer.php")
?>
<html>