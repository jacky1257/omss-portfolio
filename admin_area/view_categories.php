<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
    <style>
         h3 {
            text-align: center;
           
            
            
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            
            border: solid;
        }

        th, td {
            border: 1px solid #6c757d;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #dee2e6;
        }

        td {
            background-color: #fff;
           
        }

        a {
            text-decoration: none;
            color: #000;
        }

        i {
            margin-right: 5px;
        }
       
        

    </style>
</head>
<body>
    <h3>All Categories</h3>
    <table>
        <tr>
            <th>No.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>


        <?php 
        $select_cat="SELECT * FROM `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
        
        
        ?>

        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $category_title;?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>'><i class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>'><i class='fa-solid fa-trash'></a></td>
        </tr>
        <?php  
    
    
    
    } ?>
    </table>
</body>

</html>