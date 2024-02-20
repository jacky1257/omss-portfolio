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

    <ul class="nav-links">
    
        <?php 

        //Display User name condition
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

        //Login Condition
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
            <a href="../admin_area/admin_login.php"> 
            <i class='fa-solid fa-arrow-right-from-bracket'></i>
            <span>Login as Admin</span>
            </a>
        </li>
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
        <?php 
        if(isset($_SESSION['username'])){
            echo "<li>
            <a href='./users_area/profil.php'>
                <i class='fa-solid fa-sliders'></i>
                <span>My Account</span>
                </a>
        </li>";
        }else{
            echo "<li>
            <a href='./users_area/user_registeration.php'>
                <i class='fa-solid fa-sliders'></i>
                <span>Register</span>
                </a>
        </li>";
        }
        
        ?>
       
        <li>
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i><sup><?php
                cart_item();?></sup>
                
            </a>
        </li>
        <li>
            <a href="#">
                <span>Total Price : <?php total_cart_price();?>/- </span>
            </a>
        </li>
    </ul>

    <form action="search_product.php" method="get">
        <input type="search" placeholder="Search" name="search_data">
        <input type="submit" value="Search" name="search_data_product">
    </form>
        
</nav>

<!--Calling cart function-->
<?php
cart()
?>

   
<!-- Product Display (Using Function)-->
<div class="container">
<?php
getProducts();
getUnique_Cat();
getUnique_Brands();
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
?>
 </div>
</body>

<!--calling footer.php-->
<?php
include("./includes/footer.php")
?>
<html>