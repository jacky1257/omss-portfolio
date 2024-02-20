<?php
include('../includes/connect.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medi Pharma - Check Out Page</title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="myscript.js"></script>

    <style>
        .container {
            justify-content: center;
        }

    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <h5>Medi<span>Pharma</span></h5>
        </div>

    <form action="search_product.php" method="get">
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
            <a href='./user_login.php'>
                <i class='fa-solid fa-arrow-right-from-bracket'></i>
                <span>Login</span>
            </a>
        </li>";
        }else{
            echo "<li>
            <a href='logout.php'>
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
            <a href="user_registeration.php">
                <i class="fa-solid fa-sliders"></i>
                <span>Register</span>
                </a>
        </li>
       
    </ul>



</nav>


<!-- Product Display (Using Function)-->
<div class="container">
    
    <?php
    if(!isset($_SESSION['username'])){
        include('user_login.php');
    }else{
        include('payment.php');
    }
    ?>
    
 </div>
</body>

<?php 
include("../includes/footer.php")
?>

<html>