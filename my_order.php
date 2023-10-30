<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- logo -->
		<link rel="icon" href="./images/ace_logo.png" />
    <title>My Order</title>
</head>
<style>
    .product{
        width: 25%;
    height: 25%;
    }
</style>
<body>

<?php
        $username=$_SESSION['username'];
        $get_user_query="select * from user_registration where username='$username'";
        $result_user_query=mysqli_query($con,$get_user_query);
        $row_fetch=mysqli_fetch_assoc($result_user_query);
        $user_id=$row_fetch['user_id'];

?>



<h2 class='rounded text-center border border-dark bg-white text-dark'>
                Product Review
            </h2>
            <br>
            <table class="table table-bordered mt5">
            <thead class="bg-primary">
                <tr>
                    <th class="text-center">Sl no</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Quantity <br>X<br>Price</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Invoice Number</th>
                    <th class="text-center">Date & Time</th>
                    <th class="text-center">Complete<br><center>Or</center>Incomplete</th> 
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white">

            <?php
            $number=1;
            $get_order_details="select * from user_order_tbl where user_id=$user_id";
            $result_order_details=mysqli_query($con,$get_order_details);
            while($row_order=mysqli_fetch_assoc($result_order_details))
            {
                
                $order_id=$row_order['order_id'];
                $order_amount_due=$row_order['particular_price'];
                $order_invoice_number=$row_order['invoice_number'];
                $order_status=$row_order['order_status'];
                $product_id=$row_order['product_id'];
                $product_quantity=$row_order['products_quantity'];
                $select_product="select * from product_tbl where product_id=$product_id";
                $result_product=mysqli_query($con,$select_product);
               
                while($row_product=mysqli_fetch_assoc($result_product))
                {
                    $product=$row_product['product_id'];
                    $product_image=$row_product['product_image'];
                    $product_name=$row_product['product_name'];
                    $product_current_price=$row_product['product_current_price'];
                if($order_status=='pending')
                {
                    $order_status='Incompleted';
                }
                else
                {
                    $order_status='Completed';
                }
                $order_date=$row_order['order_date'];
                
                echo "<tr>
                
                <th class='text-center'>$number</th>
                <th class='text-center'>$product_name</th>
                <th class='text-center'><a href='single_product_page.php?product_id=$product_id'><img src='./Admin Panel/Product_Image/$product_image' alt='' class='product' srcset=''></a></th>
                <th class='text-center'>$product_quantity X $product_current_price</th>
                <th class='text-center'>$order_amount_due</th>
                <th class='text-center'>$order_invoice_number</th>
                <th class='text-center'>$order_date</th>
                <th class='text-center'>$order_status</th>";

                if($order_status=='Completed')
                {
                   echo "<th><a href='./review.php?order_id=$order_id'><input type='submit' class='btn btn-success mb-2 px-4 border border-success' 
                    value='Write Review'></a></th>";
                }else{
                    echo "<th><a href='card_details_and _payment.php?order_id=$order_id'><input type='submit' class='btn btn-primary mb-2 px-4 border border-dark' 
                    value='Confirm'></a></th>
                </tr>";
                }
                
                $number++;
            }
        }

        
?>
            </tbody>
</table>
</body>
</html>