<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_category']))
{
    $delete_category=$_GET['delete_category'];
    $delete_category_query="delete from category_tbl where category_id=$delete_category";
    $result_delete_category_query=mysqli_query($con,$delete_category_query);
    if($result_delete_category_query)
    {
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('./view_category.php','_self')</script>";
    }
}
?>