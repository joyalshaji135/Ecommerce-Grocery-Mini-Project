<?php

include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>

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
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
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
.payment{
	height: 350px;
	width: 450px;
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
					}
                    else
					{
						echo "<li><a href='logout.php'>Logout</a></li>";
					}
					?>
					<?php
                       if(!isset($_SESSION['username']))
					   {
						   echo "<li><a href='registered.php'><i class='fa-solid fa-user'></i>Guest</a></li>";
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
				<li class="active">Payment Method</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<?php

        $username=$_SESSION['username'];
        $get_user_query="select * from user_registration where username='$username'";
        $result_user_query=mysqli_query($con,$get_user_query);
        $row_fetch=mysqli_fetch_assoc($result_user_query);
        $user_id=$row_fetch['user_id'];

?>

<div class="container">
	<div class="row">
		<h1 class="text-center text-info">𝓢𝓮𝓵𝓮𝓬𝓽 𝓟𝓪𝔂𝓶𝓮𝓷𝓽 𝓜𝓮𝓽𝓱𝓸𝓭</h1>
		<div class="col-md-6">
			<a href="#"><img src="./images/upipayment.jpg" alt="" srcset="" class="payment"></a>
		</div>
		<div class="col-md-6">
		<a href="./insert_order.php?user_id=<?php echo $user_id ?>"><img src="./images/banktransferpayment.png" alt="" srcset="" class="payment"></a>
		</div>
	</div>
</div>









<?php

include('./Layouts/footer.php');

?>
</body>
</html>