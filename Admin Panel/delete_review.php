<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_review']))
{
    $delete_review=$_GET['delete_review'];
    $delete_review_query="delete from review_tbl where review_id=$delete_review";
    $result_review_query=mysqli_query($con,$delete_review_query);
    if($result_review_query)
    {
        echo "<script>alert('Review Deleted Successfully')</script>";
        echo "<script>window.open('./view_review.php','_self')</script>";
    }
}