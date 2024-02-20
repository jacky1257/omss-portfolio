<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <style>
        .editProduct_container {
            margin: 0 auto;
            width: 80%;
            text-align: center;
            padding: 30px;
            background-color: #e6ffcc;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            text-align: left;
            margin-left: 240px;
        }

        input {
            padding: 5px;
            width: 50%;
        }

        img {
            width: 50px;
        }

        .submit_btn {
            padding: 20px;
        }

        select {
            padding: 20px;
        }
    </style>
</head>
<body>

<?php
// Check if the edit_products parameter is set in the URL
if (isset($_GET['edit_products'])) {
    // Get the product ID to be edited
    $edit_id = $_GET['edit_products'];

     // Fetch the existing product data from the database based on the product ID
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    //fetch data
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    //fetching category id
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

    //fetching brands id
    $select_brand = "SELECT * FROM brands WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}
?>
<!-- HTML Form for Editing Product -->
<div class="editProduct_container">
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <!-- Input fields for product details -->
        <label for="product_title">Product Title</label>
        <div>
            <input type="text" id="product_title" name="product_title" required="required"
                   value="<?php echo $product_title ?>">
        </div>

        <label for="product_desc">Product Description</label>
        <div>
            <input type="text" id="product_desc" name="product_desc" required="required"
                   value="<?php echo $product_description ?>">
        </div>

        <label for="product_keywords">Product Keyword</label>
        <div>
            <input type="text" id="product_keywords" name="product_keywords" required="required"
                   value="<?php echo $product_keywords ?>">
        </div>

         <!-- Select option for product category -->
        <label for="product_category">Product Categories</label>
        <div>
            <!-- Pre-fill the current category and list all available categories -->
            <select name="product_category">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                // Loop through all available categories
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title_all = $row_category_all['category_title'];
                    $category_id_all = $row_category_all['category_id'];
                    // Display each category as an option
                    echo "<option value='$category_id_all'>$category_title_all</option>";
                }
                ?>
            </select>
        </div>
        <!-- Select option for product brand -->           
        <label for="product_brands">Product Brands</label>
        <div>
            <select name="product_brand">
                <!-- Pre-fill the current brand and list all available brands -->
                <option value="<?php echo $brand_id ?>"><?php echo $brand_title ?></option>
                <?php
                 // Loop through all available brands
                $select_brand_all = "SELECT * FROM `brands`";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title_all = $row_brand_all['brand_title'];
                    $brand_id_all = $row_brand_all['brand_id'];
                     // Display each brand as an option
                    echo "<option value='$brand_id_all'>$brand_title_all</option>";
                }
                ?>
            </select>
        </div>
        <!-- Input fields for product images -->       
        <label for="product_image1">Product Image 1</label>
        <div>
            <input type="file" id="product_image1" name="product_image1" required="required">
            <img src="./product_images/<?php echo $product_image1 ?>">
        </div>

        <label for="product_image2">Product Image 2</label>
        <div>
            <input type="file" id="product_image2" name="product_image2" required="required">
            <img src="./product_images/<?php echo $product_image2 ?>">
        </div>

        <label for="product_image3">Product Image 3</label>
        <div>
            <input type="file" id="product_image3" name="product_image3" required="required">
            <img src="./product_images/<?php echo $product_image3 ?>">
        </div>
        
        <!-- Input field for product price -->
        <label for="product_price">Product Price</label>
        <div>
            <input type="text" id="product_price" name="product_price" required="required"
                   value="<?php echo $product_price ?>">
        </div>

        <!-- Submit button -->     
        <div class="submit_btn">
            <input type="submit" name="edit_product" value="Update product">
        </div>
    </form>
</div>

<?php
// Handle form submission when the 'edit_product' button is clicked
if (isset($_POST['edit_product'])) {
    // Get values from the form
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = isset($_POST['product_brand']) ? $_POST['product_brand'] : ''; // Check if product_brand is set
    $product_price = $_POST['product_price'];

    // Get file names and temporary paths for images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if (
        // Validate if all required fields are filled
        empty($product_title) ||
        empty($product_description) ||
        empty($product_keywords) ||
        empty($product_category) ||
        empty($product_brand) ||
        empty($product_image1) ||
        empty($product_image2) ||
        empty($product_image3) ||
        empty($product_price)
    ) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        // Move uploaded image files to the destination directory
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Update product details in the database
        $update_product = "UPDATE `products` SET 
            product_title='$product_title',
            product_description='$product_description',
            product_keywords='$product_keywords',
            category_id='$product_category',
            brand_id='$product_brand',
            product_image1='$product_image1',
            product_image2='$product_image2',
            product_image3='$product_image3',
            product_price='$product_price',
            date=NOW() WHERE product_id=$edit_id";

        // Execute the update query
        $result_update = mysqli_query($con, $update_product);

         // Check if the update was successful
        if ($result_update) {
            echo "<script>alert('Product Update Successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        } else {
            echo "Error updating product: " . mysqli_error($con);
        }
    }
}
?>

</body>
</html>
