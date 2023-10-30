<!-- including connection -->
<?php

include('../Connection/db_connection.php');
session_start();
if(isset($_POST['insert_sub_category']))
{
        $sub_category_name=$_POST['sub_category_name'];
        $select_category=$_POST['select_category'];
        //Select data from database
            
                if($sub_category_name=='' or $select_category=='')
                    {
                        echo "<script>alert('Fill the Category')</script>";
                        echo "<script>window.open('./insert_sub_category.php','_self')</script>";
                    }
                    else
                    {
                        $sub_category_insert_query="insert into sub_category_tbl (sub_category_name,category_id)
                        values ('$sub_category_name','$select_category')";
                        $sub_category_result=mysqli_query($con,$sub_category_insert_query);
                        if($sub_category_result)
                        {
                            echo "<script>alert('Sub Category has been inserted Sucessfully')</script>";
                            echo "<script>window.open('./insert_sub_category.php','_self')</script>";

                        }
                    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- logo -->
		<link rel="icon" href="../images/ace_logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Sub Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
  .logo{
    width: 6%;
    height: 6%;
}
.agile-login ul a {
    font-size: bold;
    text-transform: capitalize;
    color: black;
    text-decoration: none;
}
body
{
    overflow-x:hidden;
}
</style>
<body class="bg-light">
<div class="container-fluid p-0">
  <!--First Child Start-->
            <nav class="navbar nav-expand-lg bg-primary">
                      
                          <img src="../images/ace_logo.png" alt=""class="logo">
                                <div class="agile-login">
                                  <div class="text-center  p-2">
                                    <ul>
                                    <?php
          
					if(!isset($_SESSION['admin_name']))
					{
						echo "<b><a href='#' class='text-white'></a></b>";
					}else
					{
            $admin_name=$_SESSION['admin_name'];
						echo "<b><a href='#' class='text-white'>Welcome $admin_name</a></b>";
					}
					?>
          <br>
         
          <?php
					if(!isset($_SESSION['admin_name']))
					{
						echo "<b><a href='./admin_login.php' class='text-white btn btn-dark'>Login</a></b>";
					}else
					{
						echo "<b><a href='../index.php' class='text-white btn btn-dark'>Logout</a></b>";
					}
					?>
                                    </ul>
                                  </div>
                                </div>
                      
            </nav>
        <!--First Child End-->
<!--Second Child Start-->
                            <div class="bg-light">
                                        <h3 class="text-center p-2">
                                          Manage Detials
                                        </h3>
                            </div>
<!-- Second Child End  -->
<!-- Navbar Start -->
              <nav class="navbar navbar-expand-lg bg-primary">
  
    <a class="navbar-brand text-white" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home Page</a>
</li>
</ul>
</div>

</nav>

    <br>

       <h2 class="text-center text-dark mb-3">Sub-Categorys</h2>
  
     <form action="" method="post" class="w-90 mb-2">
    <!--Categorys-->

    <div class="form-outline mb-5 w-50 m-auto">
                <select name="select_category" id="" class="form-select">
                    <option value="">Select the Categorys</option>
                    <!--PHP Connection Start in Category-->
                <?php
                $category_select_query="Select * from category_tbl";
                $category_result_query=mysqli_query($con,$category_select_query);
                while($category_row=mysqli_fetch_assoc($category_result_query))
                {
                    $category_name=$category_row['category_name'];
                    $category_id=$category_row['category_id'];
                   echo "<option value='$category_id'>$category_name</option>";
                }
                ?>  
                <!--PHP Connection End in Category-->
                </select>
            </div>

<div class="form-outline mb-5 w-50 m-auto">
  
  
  
<i class="fa-solid fa-receipt"><input type="text" class="form-control" name="sub_category_name" placeholder="Insert Sub Category" 
  aria-label="insert_sub_category" autocomplete="off" aria-describedby="basic-addon1"></i>
</div>
<div class="form-outline mb-5 w-50 m-auto">
<input type="submit" class="rounded form-control bg-primary text-white border-0 p-2 my-3" name="insert_sub_category" value="Sub Category">
</div>
<div class="row">
  <div class="col-md-6">
<img src="../images/ace_logo.png" alt="" srcset="" class="inter">
  </div>
  <div class="col-md-6">
  <img src="../images/ace_logo.png" alt="" srcset="" class="inter">
  </div>
</div>
</form>  
<div class="bg-primary p-3 text-center">  
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>


