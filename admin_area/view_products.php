<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        h1 {
            text-align: center;
        }

        th {
            border: 1px solid;
            padding: 10px;
            margin: 10px;
            background-color: beige;
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            border: 1px solid;
            background-color: #6c757d;
            color: #fff;
            
        }

        img {
            width:70px;
            height: auto;
            height: 70px;
            
            
        }
        

    </style>
</head>
<body>
    <h1>All Products</h1>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
        $get_products="SELECT * FROM `products`";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
            ?>
            <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $product_title;?></td>
            <td> <img src='./product_images/<?php echo $product_image1;?>'></td>
            <td><?php echo $product_price;?>/-</td>
            <td><?php 
            $get_count="SELECT * FROM `orders_pending` WHERE product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;
            
            ?></td>
            <td><?php echo $status;?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></a></td>
        </tr>
            
        <?php    
        }
        
        
        ?>


        
    </table>
</body>
</html>