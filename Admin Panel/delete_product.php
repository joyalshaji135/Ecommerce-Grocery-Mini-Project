<?php
include('../Connection/db_connection.php');
if(isset($_GET['product_id']))
{
    $delete_product=$_GET['product_id'];
    $delete_product_query="delete from product_tbl where product_id=$delete_product";
    $result_delete_query=mysqli_query($con,$delete_product_query);
    if($result_delete_query)
    {
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('./view_product.php','_self')</script>";
    }
}