<?php
include('../Connection/db_connection.php');
session_start();
?>
<?php
        
        if(isset($_GET['category_id']))
        {
            $edit_category_id=$_GET['category_id'];
            $select_category_query="select * from category_tbl where category_id=$edit_category_id";
            $result_category=mysqli_query($con,$select_category_query);
            $row_category=mysqli_fetch_assoc($result_category);
            $category_name=$row_category['category_name'];
            
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
    <title>Edit Category</title>
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

       <h2 class="text-center text-dark mb-3">Edit Category</h2>
       <hr>
</nav>

<form action="" method="post" class="w-90 mb-2">
<div class="form-outline mb-5 w-50 m-auto">
  <input type="text" class="form-control" name="category_name" placeholder="Insert Category"
  value="<?php echo "$category_name";?>"aria-label="insert_category" autocomplete="off" aria-describedby="basic-addon1">
</div>
<div class="form-outline mb-5 w-50 m-auto">
  <input type="submit" class="form-control bg-primary text-white border-0 p-2 my-3" name="edit_category" value="Update Category">
 
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
</div>
<div class="bg-primary p-3 text-center">
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>
</div> 
</body>
</html>

<?php
    
    if(isset($_POST['edit_category']))
    {
        $category=$_POST['category_name'];
        $update_category_query="update category_tbl set category_name='$category' where 
        category_id=$edit_category_id";
        $result_update=mysqli_query($con,$update_category_query);
        if($result_update)
        {
            echo "<script>alert('Category Updated Successfully')</script>";
            echo "<script>window.open('./view_category.php','_self')</script>";

        }
    }

?>