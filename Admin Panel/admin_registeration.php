<?php

include('../Connection/db_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- logo -->
		<link rel="icon" href="../images/ace_logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    .admin{
        width: 80%;
        height: 100%;
        
    }
    /* body{
        overflow: hidden;
    } */
</style>
<body>
    <div class="container-fluid m-3 p-0">
        <h2 class="text-center text-primary">Admin Registeration</h2>
        <hr class="text-primary">
        <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
        <img src="./admin image/admin.webp" 
        alt="admin registeration" srcset="" class="admin">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">
                        Username
                    </label>
                    <input type="text" id="adminname" name="admin_name"
                    palceholder="Enter Your Name" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">
                        Email
                    </label>
                    <input type="email" id="email" name="admin_email"
                    palceholder="Enter Your Email" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">
                        Password
                    </label>
                    <input type="password" id="password" name="admin_password"
                    palceholder="Enter Your Password" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_confirm_password" class="form-label">
                        Confirm Password
                    </label>
                    <input type="password" id="confirmpassword" name="admin_confirm_password"
                    palceholder="Enter Your Confirm Password" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <input type="checkbox" name="" id=""> Terms and Condition Appcet
                </div> 
                <div class="form-outline mb-4">
                    <input type="submit" 
                    value="Registeration" 
                    class="btn btn-primary" 
                    name="register">
                    <br>
                    <br>
                    <b><p class="small">Don't you hav an account?
                        <a href="admin_login.php" class="link-danger">Login</a>
                    </p></b>
                </div>
            </form>
        </div>
        </div>
        
    </div>
</body>
</html>

<?php

          if(isset($_POST['register']))
             {
                    $admin_name=$_POST['admin_name'];
                    $admin_email=$_POST['admin_email'];
                    $admin_password=$_POST['admin_password'];
					$hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
                    $confirm_user_password=$_POST['admin_confirm_password'];

					$insert_login_query="insert into `admin_tbl` 
                    (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
                    $sql_login_execute=mysqli_query($con,$insert_login_query);
					if($sql_login_execute)
					{
						echo "<script>alert('Registeration SucessFully')</script>";
						echo "<script>window.open('index.php','_self')</script>";
					}
					
                     
             }	

?>