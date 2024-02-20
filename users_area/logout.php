
<?php 
// PHP code to handle logout
session_start(); // Start the session
session_unset(); //Unset all session variables
session_destroy(); // Destroy the session

// Display a logout alert and redirect to the index page
echo "<script>alert('Logged Out')</script>";
echo "<script>window.open('../index.php','_self')</script>";
?>