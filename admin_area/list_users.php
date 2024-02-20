<style>
        h1 {
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
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

        img {
            width: 50px;
        }
    </style>
    <h1>All Users</h1>
<table>



<?php 
$get_payments="SELECT * FROM `user_table`";
$result=mysqli_query($con,$get_payments);
$rows_count=mysqli_num_rows($result);
echo "<tr>
<th>No</th>
<th>User Name</th>
<th>User Email</th>
<th>User Image</th>
<th>User Address</th>
<th>Phone Number</th>


</tr>";

if($rows_count==0){
    echo "<h2>No Users</h2>";
}else{
    $number=0;
    while($rows_data=mysqli_fetch_assoc($result)){
        $user_id=$rows_data['user_id'];
        $username=$rows_data['username'];
        $user_email=$rows_data['user_email'];
        $user_image=$rows_data['user_image']; 
        $user_address=$rows_data['user_address'];
        $user_mobile=$rows_data['user_mobile'];
        $number++;

        echo "<tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$username'></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
       
    </tr>";

    }
}




?>
    
    
</table>