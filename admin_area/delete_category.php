<?php 
if(isset($_GET['delete_category'])){
$delete_category=$_GET['delete_category'];

// Construct the DELETE query
$delete_query="DELETE FROM `categories` WHERE category_id=$delete_category";

// Execute the DELETE query
$result=mysqli_query($con,$delete_query);

if($result){
// Display an alert if the deletion is successful
echo "<script>alert('Category is been Deleted Successfully')</script>";

// Redirect to the 'index.php?view_categories' page
echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}



?>