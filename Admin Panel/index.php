<?php
include('../Connection/db_connection.php');
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- logo -->
		<link rel="icon" href="../images/ace_logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
<style>
  .logo{
    width: 6%;
    height: 6%;
}
.admin{
  width: 100%;
  height: 100%;
 
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
            <div class="container-fluid">
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
        <!--Second Child End-->
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home Page</a>

          <!-- Users Details -->
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           User Details
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./view_user.php">View Users</a></li>
          </ul>
        </li>

          <!-- Isert & View Categorys -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="insert_category.php">Insert Category</a></li>
            <li><a class="dropdown-item" href="./view_category.php">View Category</a></li>
          </ul>
        </li>

         <!-- Isert & View Sub Categorys -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Sub Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./insert_sub_category.php">Insert Sub Category</a></li>
            <li><a class="dropdown-item" href="./view_sub_category.php">View Sub Category</a></li>
          </ul>
        </li>

         <!-- Isert & View Products -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./insert_product.php">Insert Products</a></li>
            <li><a class="dropdown-item" href="view_product.php">View Products</a></li>
          </ul>
        </li>
        
         <!-- Isert & View Top Selling Products -->

       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Top Selling Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">View Top Selling Products</a></li>
          </ul>
        </li> -->
        
         <!-- View Top Selling Complete Orders & Pending Orders -->

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Orders
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./view_order.php">View Orders</a></li>
          </ul>
        </li>
        
         <!-- Isert & View Completed Payments & Pending Payments -->

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Payment
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./view_payment.php">View Payment</a></li>
          </ul>
        </li>
        
         <!-- Isert & View Products Reviews -->

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Product Review
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./view_review.php">View Product Review</a></li>
          </ul>
        </li>
    </ul>
    </div>
  </div>
</nav>
   <!-- Navbar End -->
   <div class="container">
   <!-- including insert category PHP code  -->
   
    </div>
    
    <img src="../images/11.jpg" alt="" srcset="" class="admin">
    <div class="bg-primary p-3 text-center">
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>   
</div>
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>