<?php 
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
   
    //fetch the categories
    $get_categories="SELECT * FROM `categories` WHERE category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];

    $update_query="UPDATE `categories` SET category_title='$cat_title' WHERE category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo " <script>alert('Category is Updated Successfully')</script>";
        echo " <script>window.open('./index.php?view_categories','_self')</script>";
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
        <label for="category_title"></label>
        <input type="text" name="category_title" id="category_title" required="required"
        value='<?php echo $category_title ?>'>

        <input type="submit" value="Update Category" name="edit_cat">
    </form>
</body>
</html>