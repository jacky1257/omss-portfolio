<!--Connect to the file-->
<?php
include('../includes/connect.php');
//if insert button is click all the accessing will be perform
if(isset($_POST['insert_product'])){

  //accessing input field and store in new variable
  $product_title=$_POST['product_title'];
  $description=$_POST['description'];
  $keyword=$_POST['keyword'];
  $product_category=$_POST['product_category'];
  $product_brands=$_POST['product_brands'];
  $product_price=$_POST['product_price'];
  $product_status='true';

  //accessing images
  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];
  
  //accesing image temp name
  $temp_image1=$_FILES['product_image1']['tmp_name'];
  $temp_image2=$_FILES['product_image2']['tmp_name'];
  $temp_image3=$_FILES['product_image3']['tmp_name'];

  //checking empty condition
  if($product_title=='' or  $description=='' or $keyword=='' or $product_category=='' or $product_brands=='' or   $product_price==''
  or $product_image1=='' or  $product_image2=='' or $product_image3==''){
    echo "<script>alert('Please fill the blank')</script>";
    exit();
  }else{
    move_uploaded_file( $temp_image1,"./product_images/$product_image1");
    move_uploaded_file( $temp_image2,"./product_images/$product_image2");
    move_uploaded_file( $temp_image3,"./product_images/$product_image3");

    //insert query
    $insert_products="INSERT INTO `products` (product_title,product_description,product_keywords,category_id,
    brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description',
    '$keyword','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
      echo "<script>alert('Product Insert Succesfully!!')</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">


<style>
    .form_pro {
      text-align: center;
      padding: 20px;
    }

    
    .form_outline {
      margin: 0 auto;
      text-align: left;
      max-width: 500px;
     
    }


    .form_outline label {
        display: block;
        margin-bottom: 2px;
        padding: 5px;
    }

    .form_outline input {
      width: 100%;
      padding: 8px;
      border: none;
    }

    .file_input{
        margin-left: -7px;
    }

    .sub_btn {
  display: block;
  margin-top: 10px;
  margin-left: 353px; 
  padding: 15px;
  background-color: #fff;
  border-radius: 10px;
  transition: background-color 0.8s ease;
  border: none;
}

.sub_btn:hover {
  background-color: #ace600;
  color: white;
}
   </style>
</head>

<body style="background-color: #d8dde6;">
  <div class="form_pro">
    <h1>Insert Product</h1>

    <!--form-->
    <form action="" method="post" enctype="multipart/form-data">
    <!--title-->
    
      <div class="form_outline">
        <label for="product_title">Product Title</label>
        <input type="text" name="product_title" id="product_title" placeholder="Enter the Product Title"
          autocomplete="off" required="required">
      </div>

       <!--description-->
      <div class="form_outline">
        <label for="description">Product Description</label>
        <input type="text" name="description" id="description" placeholder="Enter the Product Description"
          autocomplete="off" required="required">
      </div>

        <!--Description View-->


        <!--Keyword-->
    <div class="form_outline">
        <label for="keyword">Product Keyword</label>
        <input type="text" name="keyword" id="keyword" placeholder="Enter the Product Keyword"
        autocomplete="off" required="required">
    </div>
        <!--Category-->
            <div class="form_outline">
                <select name="product_category" id="" style="padding: 5px; margin-top:10px;">
                    <option value="">Select Category</option>
                    <?php
                        $select_query="SELECT * FROM `categories`";
                        $result_query=mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

        <!--Brand-->
        <div class="form_outline">
                <select name="product_brands" id="" style="padding: 5px; margin-top:10px; ">
                    <option value="">Select Brands</option>
                    <?php
                        $select_query="SELECT * FROM `brands`";
                        $result_query=mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

        <!--Image 1-->
   
        <div class="form_outline">
            <label for="product_image1">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="file_input" required="required">
        </div>

         <!--Image 2-->
   
         <div class="form_outline">
            <label for="product_image2">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="file_input" required="required">
        </div>

         <!--Image 3-->
   
         <div class="form_outline">
            <label for="product_image3">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="file_input" required="required">
        </div>

         <!--Price-->
            <div class="form_outline">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" id="product_price" placeholder="Enter the Product Price"
                autocomplete="off" required="required">
            </div>

             <!--Insert Button-->
             
                <input type="submit" name="insert_product" class="sub_btn" value="Insert Product">
            
    
  </div>
  </form>
</body>
</html>