<?php
include('../includes/connect.php');


include('../function/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-image: linear-gradient(to right, rgba(255, 0, 0, 0), rgb(82, 204, 0));
            padding: 10px;
        }

        .logo-container {
            margin-left: 4rem;
        }

        .logo-container img {
            max-height: 70px;
        }

        .links-container ul {
            list-style-type: none;
            display: flex;
        }

        .links-container li {
            margin-right: 20px;
        }

        .links-container a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .logo-details {
            border-radius: 30px;
            width: 20%;
            padding: 20px;
            margin: 20px auto;
            background-color: #6c757d;
            text-align: center;
        }

        .manage-details {
            border: 3px #ace600 solid;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        a {
          text-decoration: none;
          font-size: 15px;
        }

        button {
            height: 40px;
            padding: 10px;
            margin: 10px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            transition: background-color 0.8s ease;
        }

        button:hover {
            background-color: #ace600;
            color: #fff;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo-container">
            <a href="#"><img src="medi.png" alt="pharmacy" style="width: 100px;"></a>
        </div>
        <div class="links-container">
            <ul>
                <li>
                  <a href="#">Hello, Admin</a>
                  <a href="logout.php">Logout</a>
                  
              </li>
                
               
            </ul>
        </div>
    </div>

    <div class="logo-details">
        <h3 style="color:#fff;">Manage Details</h3>
    </div>

    <div class="manage-details">
        <button><a href="../admin_area/insert_product.php">Insert Product</a></button>
        <button><a href="index.php?view_products">View Products</a></button>
        <button><a href="../admin_area/index.php?insert_category">Insert Categories</a></button>
        <button><a href="index.php?view_categories">View Categories</a></button>
        <button><a href="../admin_area/index.php?insert_brands">Insert Brands</a></button>
        <button><a href="index.php?view_brands">View Brands</a></button>
        <button><a href="index.php?list_orders">All Orders</a></button>
        <button><a href="index.php?list_payments">All Payments</a></button>
        <button><a href="index.php?list_users">List Users</a></button>
        
    </div>
<div class="container">
  <?php
    if(isset($_GET['insert_category'])){
      include('insert_categories.php');
    }
    if(isset($_GET['insert_brands'])){
      include('insert_brands.php');
    }
    // Check if the 'view_products' parameter is set in the URL
    if(isset($_GET['view_products'])){
    // Include the 'view_products.php' file to display the products
      include('view_products.php');
    }
    // Check if the 'edit_products' parameter is set in the URL
    if(isset($_GET['edit_products'])){
    // Include the 'edit_products.php' file to handle product editing
      include('edit_products.php');
    }
    if(isset($_GET['delete_product'])){
      include('delete_product.php');
    }
    if(isset($_GET['view_categories'])){
      include('view_categories.php');
    }
    if(isset($_GET['view_brands'])){
      include('view_brands.php');
    }
    if(isset($_GET['edit_category'])){
      include('edit_category.php');
    }
    if(isset($_GET['edit_brands'])){
      include('edit_brands.php');
    }

    if(isset($_GET['delete_category'])){
      include('delete_category.php');
    }
    if(isset($_GET['delete_brands'])){
      include('delete_brands.php');
    }
    // Check if 'list_orders' parameter is set
    if(isset($_GET['list_orders'])){
      // Include 'list_orders.php' file
      include('list_orders.php');
    }
    if(isset($_GET['delete_list_orders'])){
      include('delete_list_orders.php');
    }
    // Check if 'list_payments' parameter is set
    if(isset($_GET['list_payments'])){
    // Include 'list_payments.php' file
      include('list_payments.php');
    }
    // Check if 'delete_payments' parameter is set
    if(isset($_GET['delete_payments'])){
    // Include 'delete_payments.php' file
      include('delete_payments.php');
    }
    if(isset($_GET['list_users'])){
      include('list_users.php');
    }
    
?>

</div>

</body>

<?php

include("../includes/footer.php");
?>
</html>