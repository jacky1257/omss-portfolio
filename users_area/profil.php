<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediPharma</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../myscript.js"></script>

    <style>
        .profil_container {
           margin-left: 220px;
        } 

        .profil_container ul {
            width: 110%;
        }

        .profil_container li {
            border: 1px solid white;
        }

        .profil_container_sec {
            border: #53ff1a 1px solid;
            width: 55%;
            margin-left: 100px;
            height: 400px;
            margin-top: 100px;
            text-align: center;
        }

        .profil_container,
    .profil_container_sec {
        display: inline-block;
        vertical-align: top;
    }
        img {
            width: 150px;
            margin-left: 25px;
            padding: 10px;
        }

        a {
            text-decoration: none;
            
        }

        h4 {
            margin-left: 0px;
            padding: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .profil_menu {
            border: 1px black;
            background-color:  #d9d9d9;
        }

        h4:hover {
            background-color:#b7e954 ;
        }

        .profil_title {
            pointer-events: none;
            color: #264d00;
            font-size: 25px;
            
        }

        .row_count {
            color: red;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <h5>Medi<span>Pharma</span></h5>
        </div>

    <form action="../search_product.php" method="get">
        <input type="search" placeholder="Search" name="search_data">
        <input type="submit" value="Search" name="search_data_product">
    </form>

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
            <a href='/users_area/user_login.php'>
                <i class='fa-solid fa-arrow-right-from-bracket'></i>
                <span>Login</span>
            </a>
        </li>";
        }else{
            echo "<li>
            <a href='/users_area/logout.php'>
                <i class='fa-solid fa-arrow-right-from-bracket'></i>
                <span>Logout</span>
            </a>
        </li>";
        }
        
        ?>
        <li>
            <a href="../index.php">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="../display_all.php">
                <i class="fa-solid fa-comments"></i>
                <span>Products</span>
                </a>
        </li>
        <li>
            <a href="profil.php">
                <i class="fa-solid fa-sliders"></i>
                <span>My Account</span>
                </a>
        </li>
       
        <li>
            <a href="../cart.php">
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
</nav>
<!--Calling cart function-->
<?php
cart()
?>

<div class="profil_container">
    <ul class="profil_menu">
        <li class="profil_title">
            <h4>Your Profile</h4>
        </li>
 <?php 

$username= $_SESSION['username'];
$user_image="SELECT * FROM `user_table` WHERE username='$username'";
$user_image=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo "<li>
<img src='./user_images/$user_image'></li>";

?>
        <li>
        <a href="profil.php"><h4>Pending Orders</h4></a>
        </li>
        <li>
        <a href="profil.php?edit_account"><h4>Edit Account</h4></a>
        </li>
        <li>
            <a href="profil.php?my_orders"><h4>My Orders</h4></a>
        </li>
        <li>
            <a href="profil.php?delete_account"><h4>Delete Account</h4></a>
        </li>
        <!-- HTML code for a list item with a link to logout -->
        <li>
            <a href="logout.php"><h4>Log Out</h4></a>
        </li>
    </ul>
</div>

<div class="profil_container_sec">

<?php 
get_user_order_details();
if(isset($_GET['edit_account'])){
    include('edit_account.php');
}
if(isset($_GET['my_orders'])){
    include('user_orders.php');
}
// Check if 'delete_account' is set in the URL and include the delete_account.php file if true
if(isset($_GET['delete_account'])){
    include('delete_account.php');
}


?>
</div>




</body>

<!--calling footer.php-->
<?php
include("../includes/footer.php")
?>
<html>