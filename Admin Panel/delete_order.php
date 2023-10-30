<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_order_id']))
{
    $delete_order=$_GET['delete_order_id'];
    $delete_order_query="delete from user_order_tbl where order_id=$delete_order";
    $result_delete_order_query=mysqli_query($con,$delete_order_query);
    if($result_delete_order_query)
    {
        echo "<script>alert('Order Deleted Successfully')</script>";
        echo "<script>window.open('./view_order.php','_self')</script>";
    }
}
?>