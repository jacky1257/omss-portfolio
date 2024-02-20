
<?php

//include connection
//include('./includes/connect.php');
//Displaying Product 
function getProducts(){
    global $con;

    //conditon to check
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

    $select_query = "SELECT * FROM `products` order by rand()";
    $result_query = mysqli_query($con, $select_query);
   
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "<div class='product-item'>
                  <img src='admin_area/product_images/$product_image1' alt='$product_title'>
                 
                      <h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
                     <p>$product_description</p>
                      <p>Price : RM $product_price/-</p> 
                      <div class='buttons'>
                        <div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                        <div class='view'><a href='product_details.php?product_id=$product_id'>View More</a></div>
                    </div>
              </div>";
    }
    }
    }
    }

    //getting all products
    function get_all_products(){
        global $con;

        //conditon to check
        if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    
        $select_query = "SELECT * FROM `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);
    
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
    
            echo "<div class='product-item'>
                      <img src='admin_area/product_images/$product_image1' alt='$product_title'>
                      
                          <h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
                          <p>$product_description</p>
                          <p>Price : RM $product_price/-</p> 
                        <div class='buttons'>
                            <div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                            <div class='view'><a href='product_details.php?product_id=$product_id'>View More</a></div>
                        </div>
                  </div>";
        }
        }
        }
    }

// Function to get and display products based on a specific category
function getUnique_Cat(){
global $con;
    
//conditon to check
// Check if 'category' is set in the URL parameters
if(isset($_GET['category'])){
$category_id=$_GET['category'];
            
// Select products based on the specified category
$select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
$result_query = mysqli_query($con, $select_query);
$num_of_rows=mysqli_num_rows($result_query);

// Display a message if no products are found in the category
if( $num_of_rows==0){
echo '<script>alert ("No Product in this Category")</script>';
echo '<h2 style="color:red; margin-left:550px; padding:50px;">No Product in this Category</h2>';
}
    
// Display the products in the specified category
while ($row = mysqli_fetch_assoc($result_query)) {
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_image1=$row['product_image1'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
    
            echo "<div class='product-item'>
                      <img src='admin_area/product_images/$product_image1' alt='$product_title'>
                      
                          <h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
                          <p>$product_description</p>
                          <p>Price : RM $product_price/-</p> 
                        <div class='buttons'>
                            <div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                            <div class='view'><a href='product_details.php?product_id=$product_id'>View More</a></div>
                        </div>
                  </div>";
        }
        }
        }
        

// Function to get and display products based on a specific brand
function getUnique_Brands(){
global $con;
    
// Check if the 'brand' parameter is set in the URL
if(isset($_GET['brand'])){
$brand_id=$_GET['brand'];

// Select products with the specified brand ID    
$select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
$result_query = mysqli_query($con, $select_query);
$num_of_rows=mysqli_num_rows($result_query);

// Check if there are no products for the specified brand
if( $num_of_rows==0){
echo '<script>alert ("No Product In This Brands")</script>';
echo '<h2 style="color:red; margin-left:550px; padding:50px;">No Product In This Brands</h2>';
}

// Display each product for the specified brand
while ($row = mysqli_fetch_assoc($result_query)) {
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_image1=$row['product_image1'];
$product_price=$row['product_price'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
    
echo "<div class='product-item'>
<img src='admin_area/product_images/$product_image1' alt='$product_title'>
                      
<h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
<p>$product_description</p>
<p>Price : RM $product_price/-</p> 
<div class='buttons'>
<div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
<div class='view'><a href='product_details.php?product_id=$product_id'>View More</a></div>
</div>
</div>";
  }
 }
}


// Function to display brands in the side nav
function getBrands(){
global $con;

// Select all brands from the 'brands' table
$select_brands = "SELECT * FROM `brands`";
$result_brands = mysqli_query($con,$select_brands);

// Display each brand as a list item with a link
while ($row_data = mysqli_fetch_assoc($result_brands)) {
$brand_title=$row_data['brand_title'];
$brand_id=$row_data['brand_id'];
echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }
}


// Function to display categories in the side nav
function getCategories (){
global $con;

// Select all categories from the 'categories' table
$select_categories = "SELECT * FROM categories";
$result_categories = mysqli_query($con, $select_categories);

// Display each category as a list item with a link
while ($row_data = mysqli_fetch_assoc($result_categories)) {
$category_title = $row_data['category_title'];
$category_id = $row_data['category_id'];
echo "<li><a href='index.php?category=$category_id'>$category_title</a></li>";
    }
}


//searching products function
function search_product(){
global $con;

// Check if 'search_data_product' is set in the URL parameters
if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];

    // Perform a search query in the 'products' table
    $search_query = "SELECT * FROM `products` WHERE product_keywords like '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);
    $num_of_rows=mysqli_num_rows($result_query);

    // Display a message if no results are found
if( $num_of_rows==0){
    echo '<h2 style="color: red; text-align: center;">No Result Match.</h2>';
    }
    
    // Display the search results
while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "<div class='product-item'>
                  <img src='admin_area/product_images/$product_image1' alt='$product_title'>
                
                      <h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
                      <p>$product_description</p>
                      <p>Price : RM $product_price/-</p> 
                      <div class='buttons'>
                        <div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                        <div class='view'><a href='product_details.php?product_id=$product_id'>View More</a></div>
                    </div>
              </div>";
    }
    }
}



//View More Function

function view_details(){
    global $con;

    //conditon to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_query = mysqli_query($con, $select_query);
   
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];

        echo "<div class='product-item'>
                  <img src='admin_area/product_images/$product_image1' alt='$product_title'>
                 
                      <h1><a href='index.php?$product_id'>{$row['product_title']}</a></h1>
                     <p>'$product_description'</p>
                      <p>'RM : $product_price'</p> 
                      <div class='buttons'>
                        <div class='cart'><a href='index.php?add_to_cart=$product_id'>Add to Cart</a></div>
                        <div class='view'><a href='index.php'>Go Home</a></div>
                    </div>
              </div>
              
              <div>
    <h4>Related Product</h4>
    <!--related Image-->


<div class='image_details'>
    <!--image 1-->
    <img src='admin_area/product_images/$product_image2' alt='$product_title'>



    <!--image 2-->
    <img src='admin_area/product_images/$product_image3' alt='$product_title'>
    </div>
</div>";
    }
    }
    }
}
}


//get ip address function

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;


//cart function
function cart(){
    // Check if the 'add_to_cart' parameter is set in the URL
    if(isset($_GET['add_to_cart'])){
        global $con;
        // Get the user's IP address
        $get_ip_add = getIPAddress();
         // Get the product ID from the 'add_to_cart' parameter in the URL
        $get_product_id=$_GET['add_to_cart'];
         // Check if the product is already in the cart
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'
        AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0){
             // If the item is already present in the cart, display an alert and redirect to the index page
            echo "<script>alert('This item already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            }else{
                 // If the item is not in the cart, insert it into the 'cart_details' table
                $insert_query="INSERT INTO `cart_details`(product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_add',0)";
                $result_query = mysqli_query($con, $insert_query);
                 // Display an alert and redirect to the index page
                echo "<script>alert('Item is added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
    }
}



//function to get cart item number
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
       }else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    }

    //total price function
    function total_cart_price(){ //create total cart function
        global $con;             //global connection  
        $get_ip_add = getIPAddress();  //accessing ip address and store in $get_ip_add
        $total_price=0;           //set the price
        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_product=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_product)){

            $product_price=array($row_product_price['product_price']); //store the products cart
            $product_values=array_sum($product_price);  
            $total_price+=$product_values;  
            }
        }

        echo $total_price;
    }



    //get user order details
    function get_user_order_details(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="SELECT * FROM `user_table` WHERE username='$username'";
        $result_query=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND
                order_status='pending'";
                $result_order_query=mysqli_query($con,$get_orders);
                $row_count=mysqli_num_rows($result_order_query);
                if($row_count>0){
                    echo "<h3 style='padding:20px'> You Have <span class='row_count'>$row_count</span> Pending Orders</h3>
                    <p><a href='profil.php?my_orders'>Order Details</a></p>";
                }else{
                    echo "<h3 style='padding:20px'> You Have Zero Pending Orders</h3>
                    <p><a href='../index.php'>Explore Products</a></p>";
                }
                }
            }
        }
    }
    }
?>
