<?php

include('../Connection/db_connection.php');
@session_start();
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
        <h2 class="text-center text-primary">Admin Login</h2>
        <hr class="text-primary">
        <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
        <img src="./admin image/admin.webp" 
        alt="admin registeration" srcset="" class="admin">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="adminname" class="form-label">
                        Username
                    </label>
                    <input type="text" id="adminname" name="admin_name"
                     palceholder="Enter Your Name" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input type="password" id="password" name="admin_password"
                    palceholder="Enter Your Password" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <input type="checkbox" name="" id=""> Terms and Condition Appcet
                </div> 
                <div class="form-outline mb-4">
                    <input type="submit" 
                    value="Login" 
                    class="btn btn-primary" 
                    name="login">
                    <!-- <br>
                    <br>
                    <b><p class="small">Don't you have an account?
                        <a href="./admin_registeration.php" class="link-danger">Registeration</a>
                    </p></b> -->
                </div>
            </form>
        </div>
        </div>
        
    </div>
</body>
</html>

<?php
	if(isset($_POST['login']))
	{
		$admin_name=$_POST['admin_name'];
		$admin_password=$_POST['admin_password'];
		//Select User Query
		$select_query="Select * from admin_tbl where admin_name='$admin_name'";
		$result_query=mysqli_query($con,$select_query);
		$user_row=mysqli_num_rows($result_query);
		$row_data=mysqli_fetch_assoc($result_query);

		
			$_SESSION['admin_name']=$admin_name;
			if(password_verify($admin_password,$row_data['admin_password']))
			{
                $_SESSION['admin_name']=$admin_name;
					echo "<script>alert('Login SuccessFully')</script>";
					echo "<script>window.open('index.php','_self')</script>";

			}else
			{
				echo "<script>alert('Invalid Credantial')</script>";
			}
		
	}
?>