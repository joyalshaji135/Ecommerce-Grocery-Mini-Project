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
    <title>View User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
.image{
    width: 15%;
    height: 15%;
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

       <h2 class="text-center text-primary mb-3">View All Users</h2>
       <hr class="bg-dark">
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <table class="table table-bordered mt-5">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-center">Sl no</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">User Email</th>
                    <th class="text-center">User Phone Number</th>
                    <th class="text-center">User Image</th>
                    <th class="text-center">User Address</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                $select_user_query="select * from user_registration";
                $result_user_query=mysqli_query($con,$select_user_query);
                $number=0;
                while($row_user=mysqli_fetch_array($result_user_query))
                {
                    $user_id=$row_user['user_id'];
                    $username=$row_user['username'];
                    $user_email=$row_user['user_email'];
                    $user_phone_number=$row_user['user_phone_number'];
                    $user_image=$row_user['user_image'];
                    $user_address=$row_user['user_address'];
                    $number++;
                    ?>

                        <tr>
                    <th class="text-center"><?php echo $number ?></th>
                    <th class="text-center"><?php echo $username?></th>
                    <th class="text-center"><?php echo $user_email?></th>
                    <th class="text-center"><?php echo $user_phone_number?></th>
                    <th class="text-center"><img src="../users_image_folder/<?php echo $user_image?>" alt="" srcset="" class="image"></th>
                    <th class="text-center"><?php echo $user_address?></th>
                    <th class="text-center"><a href="./delete_user.php?delete_user=<?php echo $user_id?>" class="text-dark"><i class='fa-solid fa-trash'></i></a></th>
                </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>




<div class="bg-primary p-3 text-center">
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>

</div> 
</body>
</html>