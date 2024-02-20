<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
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
    <script>
        function confirmDelete(brandId) {
            var confirmDelete = confirm("Are you sure you want to delete this brand?");
            if (confirmDelete) {
                window.location.href = 'delete_brands.php?delete_brands=' + brandId;
            }
        }
    </script>
</head>
<body>
    <h3>All Brands</h3>
    <table>
        <tr>
            <th>No.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
        $select_brand = "SELECT * FROM `brands`";
        $result = mysqli_query($con, $select_brand);
        $number = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
        ?>

        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id ?>'><i class='fa-solid fa-pen-to-square'></i>Edit</a></td>
            <td>
                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $brand_id; ?>)">
                    <i class='fa-solid fa-trash'></i>Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
