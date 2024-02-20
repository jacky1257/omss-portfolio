<?php 
// Check if 'delete_list_orders' parameter is set
if(isset($_GET['delete_list_orders'])){
    $delete_list_orders=$_GET['delete_list_orders'];

// Delete the selected order
    $delete_query="DELETE FROM `user_orders` WHERE order_id=$delete_list_orders";
    $result=mysqli_query($con,$delete_query);
// Display success message and refresh the page
if($result){
    echo "<script>alert('Orders is been Deleted Successfully')</script>";
    echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}
?>