<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
        .form-control {
            display: block;
            width: 50%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0 0.25rem 0.25rem 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin: 5px;
            
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .insert {
            padding: 0.75rem;
            font-size: 1rem;
            margin: 20px;
        }
       
        .insert_brnd {
            font-weight: bold;
            text-align: center;
            font-size: 30px;
        }
        

    
    </style>
</head>
<body>

<?php
// Include the connection file
include('../includes/connect.php');

// Check if the 'insert_brand' button is clicked
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

// Check if data exists in the database
$select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
$result_select = mysqli_query($con, $select_query);
$number = mysqli_num_rows($result_select);

if ($number > 0) {
echo "<script>alert('Brand already exists')</script>";
} else {
// Insert the brand into the database
$insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
$result = mysqli_query($con, $insert_query);

 // Check if the insertion was successful
if ($result) {
echo "<script>alert('Insert Successful')</script>";
} else {
echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
        }
    }
}

?>    
<div class="insert_brnd">Insert Brand</div>

<form action="" method="post" class="form">
<div style="display: flex; align-items:center; margin: bottom 15px;">
    <span style="background-color: #e9ecef; border: 1px solid #ced4da; padding: 0.375rem 0.75rem; margin-right: -1px;
            border-radius: 0.25rem 0 0 0.25rem;"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands">
</div>
<div>
    <input type="submit" class=insert name="insert_brand" value="Insert Brands">
</div>
</form>

</body>
</html>
