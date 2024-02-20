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
    </style>
    <h1>All Orders</h1>
<table>



<?php 
// Select all orders from 'user_orders' table
$get_orders="SELECT * FROM `user_orders`";
$result=mysqli_query($con,$get_orders);
$rows_count=mysqli_num_rows($result);

// Display table headers
echo "<tr>
<th>No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Total Products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>

</tr>";
 // Display message if there are no orders
if($rows_count==0){
    echo "<h2>No Orders to Display</h2>";
}else{
    $number=0;
while($rows_data=mysqli_fetch_assoc($result)){
    // Fetch order details
    $order_id=$rows_data['order_id'];
    $user_id=$rows_data['user_id'];
    $amount_due=$rows_data['amount_due'];
    $invoice_number=$rows_data['invoice_number']; 
    $total_products=$rows_data['total_products'];
    $order_date=$rows_data['order_date'];
    $order_status=$rows_data['order_status'];
    $number++;
// Display order details in table rows
        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='index.php?delete_list_orders=$order_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
}




?>
    
    
</table>