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
    <h1>List Payments</h1>
<!-- Display Payments Table -->
<table>
<?php 

// Select all payments from 'user_payments' table
$get_payments="SELECT * FROM `user_payments`";
$result=mysqli_query($con,$get_payments);
$rows_count=mysqli_num_rows($result);
echo "<tr>
<th>No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Amount</th>
<th>Payment Mode</th>
<th>Order Date</th>
<th>Delete</th>

</tr>";

if($rows_count==0){
// Display message if there are no payments
echo "<h2>No Payments Received</h2>";
}else{
$number=0;
while($rows_data=mysqli_fetch_assoc($result)){
// Fetch payment details
$order_id=$rows_data['order_id'];
$payment_id=$rows_data['payment_id'];
$amount=$rows_data['amount'];
$invoice_number=$rows_data['invoice_number']; 
$payment_mode=$rows_data['payment_mode'];
$date=$rows_data['date'];
$number++;
// Display payment details in table rows
        echo "<tr>
        <td>$number</td>
        <td>$amount</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href='index.php?delete_payments=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
}




?>
    
    
</table>