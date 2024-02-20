<?php
include('../includes/connect.php');
?>
<?php 
// Check if 'delete_brands' is set in the URL
if(isset($_GET['delete_brands'])){
    $delete_brands = $_GET['delete_brands'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Brand</title>
    <script>
        function confirmDelete() {
            // Ask for confirmation
            var confirmDelete = confirm("Are you sure you want to delete this brand?");

             // Redirect to delete_brands.php with the confirmed_delete parameter
            if (confirmDelete) {
                window.location.href = 'delete_brands.php?confirmed_delete=<?php echo $delete_brands;  ?>';
            }
            // Redirect back to the view_brands page if not confirmed
             else {
                window.location.href = 'index.php?view_brands';
            }
        }
    </script>
</head>
<body>
    <h1>Delete Brand</h1>
    <!-- Call the confirmDelete function on page load -->
    <script>confirmDelete();</script>
</body>
</html>

<?php
}
// Check if 'confirmed_delete' is set in the URL
if(isset($_GET['confirmed_delete'])){
$confirmed_delete = $_GET['confirmed_delete'];

// Delete the brand from the database based on the brand_id
$delete_query = "DELETE FROM `brands` WHERE brand_id = $confirmed_delete";
$result = mysqli_query($con, $delete_query);

// Check if the deletion was successful
if($result){
echo "<script>alert('Brand has been deleted successfully')</script>";
echo "<script>window.open('index.php?view_brands','_self')</script>";
 }
}
?>