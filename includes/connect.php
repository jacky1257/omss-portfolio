<?php

// Database credentials
$host = "127.0.0.1:3308";
$username = "root";
$password = "Jaekim97@";
$database = "mypharmacy";

// Establish a connection to the MySQL database
$con = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$con) {
    
    // If the connection fails, log the error or provide a user-friendly message
    die("Connection failed: " . mysqli_connect_error());
}


// ... Perform database operations ...

// Close the connection (optional as PHP will usually handle this automatically)
// mysqli_close($con);

?>