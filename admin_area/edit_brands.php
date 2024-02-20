<?php 
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];
   
    //fetch the categories
    $get_brands="SELECT * FROM `brands` WHERE brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}

if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brand_title'];

    $update_query="UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo " <script>alert('Brand is Updated Successfully')</script>";
        echo " <script>window.open('./index.php?view_brands','_self')</script>";
    }
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>

    <style>
        
        
        form {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        label {
            display: block; /* Ensure each label is on a new line */
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <h1>Edit Category</h1>

    <form action="" method="post">
        <label for="brand_title"></label>
        <input type="text" name="brand_title" id="brand_title" required="required"
        value='<?php echo $brand_title ?>'>

        <input type="submit" value="Update Brand" name="edit_brand">
    </form>
</body>
</html>