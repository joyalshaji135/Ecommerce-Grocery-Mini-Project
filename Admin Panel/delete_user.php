<?php
include('../Connection/db_connection.php');
if(isset($_GET['delete_user']))
{
    $delete_user=$_GET['delete_user'];
    $delete_user_query="delete from user_registration where user_id=$delete_user";
    $result_user_query=mysqli_query($con,$delete_user_query);
    if($result_user_query)
    {
        echo "<script>alert('User Deleted Successfully')</script>";
        echo "<script>window.open('./view_user.php','_self')</script>";
    }
}