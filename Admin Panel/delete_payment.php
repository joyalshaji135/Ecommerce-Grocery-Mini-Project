<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_payment_id']))
{
    $delete_payment=$_GET['delete_payment_id'];
    $delete_payment_query="delete from payment_tbl where payment_id=$delete_payment";
    $result_delete_payment_query=mysqli_query($con,$delete_payment_query);
    if($result_delete_payment_query)
    {
        echo "<script>alert('Payment Deleted Successfully')</script>";
        echo "<script>window.open('./view_payment.php','_self')</script>";
    }
}
?>