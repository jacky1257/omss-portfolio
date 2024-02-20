<?php 
// Check if 'delete_payments' parameter is set
if(isset($_GET['delete_payments'])){
    $delete_payments=$_GET['delete_payments'];

 // Delete the selected payment
    $delete_query="DELETE FROM `user_payments` WHERE payment_id=$delete_payments";
    $result=mysqli_query($con,$delete_query);
    if($result){

        // Display success message and refresh the page
        echo "<script>alert('The Payment is been Deleted Successfully')</script>";
        echo "<script>window.open('index.php?list_payments','_self')</script>";
    }
}



?>