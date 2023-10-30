<?php

include('../Connection/db_connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- logo -->
		<link rel="icon" href="../images/ace_logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sub Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
<body class="bg-white">
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
  
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home Page</a>
</li>
</ul>
</div>

</nav>

    <br>

       <h2 class="text-center text-primary mb-3">View Sub Categorys</h2>
       <hr>
</nav>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">
<table class="table table-bordered rounded-3 mt-3">
    <thead class="bg-primary">
        <tr>
            <th class="text-center">Sub Category ID</th>
            <th class="text-center">Sub Category Name</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
</thead>
<tbody class="bg-light">
  
    <?php

      $select_sub_category="select * from sub_category_tbl";
      $result_sub_category=mysqli_query($con,$select_sub_category);
      
      $num=mysqli_num_rows($result_sub_category);
  $numberpages=6;
  $totalpages=ceil($num/$numberpages);
  
  echo "<div class='row'>
	<div class='col-md-7'></div>
	<div class='col-md-5'>";
  for($btn=1;$btn<=$totalpages;$btn++){
	echo '<button class="btn btn-dark mx-1">
  <a href="./view_sub_category.php?page='.$btn.'" class="text-white text-decoration-none">'.$btn.'
  </a></button>';
  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }else
  {
    $page=1;
  }
}
	echo "</div> </div>";
  $startinglimit=($page-1)*$numberpages;
  $select_sub_category="select * from sub_category_tbl limit " 
  .$startinglimit.','.$numberpages;  //Change this order by Concept
  $result_sub_category=mysqli_query($con,$select_sub_category);
      while($row_cate=mysqli_fetch_assoc($result_sub_category))
      {
        $sub_category_id=$row_cate['sub_category_id'];
        $sub_category_name=$row_cate['sub_category_name'];
        

     ?><tr>
        <th class='text-center'><?php echo $sub_category_id ?></th>
        <th class='text-center'><?php echo $sub_category_name ?></th>
        <th class='text-center'><a href='edit_sub_category.php?sub_category=<?php echo $sub_category_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></th>

        <th class='text-center'><a href='delete_sub_category.php?delete_sub_category=<?php echo $sub_category_id ?>'
        type="button" class="btn btn-primary text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></th>
        </tr>
         <?php
          }

          ?>
  
</tbody>

        </table>

        <!-- Modal -->

        
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Are you Sure You want to Delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./view_category.php" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='delete_sub_category.php?delete_sub_category=<?php echo $sub_category_id ?>' 
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>

</div>
<div class="col-md-2"></div>
</div>
</div>
<div class="bg-primary p-3 text-center">
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
