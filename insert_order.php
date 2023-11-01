<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>

<?php

$get_ip_address = getIPAddress();
$username = $_SESSION['username'];
$select_user = "select * from user_registration where username='$username'";
$result_user_query = mysqli_query($con, $select_user);
$row_u = mysqli_fetch_array($result_user_query);
$user_id = $row_u['user_id'];
$invoice_number = mt_rand();
$status = 'pending';
$amount_due = 0;
$cart_query = "select * from add_to_cart_tbl";
$result_cart_query = mysqli_query($con, $cart_query);
$cart_count = mysqli_num_rows($result_cart_query);
while ($row_cart = mysqli_fetch_array($result_cart_query)) {
    $cart_product_id = $row_cart['product_id'];
    $cart_product_quantity = $row_cart['quantity'];
    $cart_id = $row_cart['cart_id'];
    $select_product_query = "select * from product_tbl where product_id=$cart_product_id";
    $result_product_query = mysqli_query($con, $select_product_query);
    while ($row_product = mysqli_fetch_array($result_product_query)) {
        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_current_price'];
        $total = $product_price * $cart_product_quantity;
        $amount_due += $product_price * $cart_product_quantity;

        /* order_id	user_id	product_id	particular_price	
                invoice_number	products_quantity	order_date	order_status	 */
        $insert_order = "insert into user_order_tbl 
                (user_id,product_id,particular_price,amount_due,invoice_number,products_quantity,order_date,order_status) 
                values ($user_id,$cart_product_id,$total,$amount_due,$invoice_number,$cart_product_quantity,NOW(),'$status')";
        $result_insert_order = mysqli_multi_query($con, $insert_order);
        if ($result_insert_order) {
            echo "<script>alert('Order are Submitted SuccessFully')</script>";
            echo "<script>window.open('./order_details.php','_self')</script>";
        }

        /* order_pending_id	order_id	user_id	product_id	amount_due	
                invoice_number	product_quantity	order_status */

        $insert_pending_order = "insert into user_order_pending_tbl 
                (user_id,product_id,amount_due,invoice_number,product_quantity,order_status) 
                values ($user_id,$cart_product_id,$total,$invoice_number,$cart_product_quantity,'$status')";
        $result_insert_order = mysqli_multi_query($con, $insert_pending_order);
    }
}


?>
        
        