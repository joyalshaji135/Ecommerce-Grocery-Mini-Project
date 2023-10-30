<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_sub_category']))
{
    $delete_sub_category=$_GET['delete_sub_category'];
    $delete_sub_category_query="delete from sub_category_tbl where sub_category_id=$delete_sub_category";
    $result_delete_sub_category_query=mysqli_query($con,$delete_sub_category_query);
    if($result_delete_sub_category_query)
    {
        echo "<script>alert('Sub Category Deleted Successfully')</script>";
        echo "<script>window.open('./view_sub_category.php','_self')</script>";
    }
}
?>