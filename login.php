<!-- including db Connection -->
<?php

include('./Connection/db_connection.php');
include('./Functions/common_function.php');
@session_start();

?>

<!-- including herder file -->
<!DOCTYPE html>
<html>
<head>
<title>Ace Mart</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

		<!-- logo -->
		<link rel="icon" href="./images/ace_logo.png" />
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
 integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
<style>
	.logo{
    width: 90px;
    height: 90px;
}
</style>	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="#">SHOP NOW</a></p>
			</div>
			<div class="agile-login">
				<ul>
				<?php
					if(!isset($_SESSION['username']))
					{
						echo "<li><a href='registered.php'> Create Account </a></li>";
					}else
					{
						$username=$_SESSION['username'];
						echo "<li><a href='#'>Welcome $username </a></li>";
					}
					?>

					<?php
					if(!isset($_SESSION['username']))
					{
						echo "<li><a href='login.php'>Login</a></li>";
					}else
					{
						echo "<li><a href='logout.php'>Logout</a></li>";
					}
					?>
					


					<?php
                       if(!isset($_SESSION['username']))
					   {
						   echo "<li><a href='./registered.php'><i class='fa-solid fa-user'></i>Guest</a></li>";
					   }else
					   {
						   echo "<li><a href='profile.php'><i class='fa-solid fa-user'></i>Profile</a></li>";
					   }
					?>
					
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
		<ul class="phone_email">
					<a href="joyalshaji755@gmail.com"><li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : +91 8590343392</li>
					</a><br>
					<br>
					<a href="joyalshaji755@gmail.com"><li><i class="fa-solid fa-envelope"></i>Order online or email us : joyalshaji755@gmail.com</li>
</a>
				</ul>	
			</div>
			<div class="w3ls_logo_products_left">
				<a href="./index.php"><img src="./images/ace_logo.png" class="logo" alt=""></a>
			</div>
		<div class="w3l_search">
			<form class="d-flex" action="./search_page.php" method="get">
        <input class="form-control" type="search" placeholder="Search for Products" aria-label="Search" name="search_data" 
		required="required">
		<br>
        <input type="submit" value="Search" class="btn btn-outline-light bg-primary" 
		name="search_data_product" style="margin-left: 155px" aria-label="Left Align">
		
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="#" method="post">
					<input type="text" placeholder="Enter your Username" required="required"
					id="user_email" class="form-control" autocomplete="off" name="username"><br>
					<input type="password" placeholder="Enter your Password" required=" " 
					id="user_password" class="form-control" autocomplete="off" name="user_password">
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login" name="user_login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="registered.php">Register Here</a> (Or) go back to <a href="index.php">Home
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->


<!-- Login Form Php Code -->

<?php
	if(isset($_POST['user_login']))
	{
		$username=$_POST['username'];
		$user_password=$_POST['user_password'];
		//Select User Query
		$select_query="Select * from user_registration where username='$username'";
		$result_query=mysqli_query($con,$select_query);
		$user_row=mysqli_num_rows($result_query);
		$row_data=mysqli_fetch_assoc($result_query);

		//Cart Items
		$user_ip_address=getIPAddress();

		$select_cart_query="Select * from add_to_cart_tbl where ip_address='$user_ip_address'"; //cart TABLE NAME IS cart_detail
		$result_cart=mysqli_query($con,$select_cart_query);
		$row_cart_count=mysqli_num_rows($result_cart);

		if($user_row>0)
		{
			$_SESSION['username']=$username;
			if(password_verify($user_password,$row_data['user_password']))
			{
				/* echo "<script>alert('Login SuccessFully')</script>"; */
				if($user_row==1 and $row_cart_count==0)
				{
					$_SESSION['username']=$username;
					echo "<script>alert('Login SuccessFully')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				}
				else
				{ 
					$_SESSION['username']=$username;
					echo "<script>alert('Login SuccessFully')</script>";
					echo "<script>window.open('payment_method.php','_self')</script>";
				}

			}else
			{
				echo "<script>alert('Invalid Credantial')</script>";
			}
		}
		else
		{
			echo "<script>alert('Invalid Credantial')</script>";
		}
	}
?>

<!-- including footer page -->

<?php

include('./Layouts/footer.php');
?>
