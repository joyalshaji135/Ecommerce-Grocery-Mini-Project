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
						echo "<li><a href='./redirect.php'>Login</a></li>";
					}
                    else
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
						   echo "<li><a href='./profile.php'><i class='fa-solid fa-user'></i>Profile</a></li>";
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
					<a href="joyalshaji755@gmail.com"><li><i class="fa-solid fa-envelope"></i>Order online or email us : </li>
</a>
				</ul>	
			</div>
			<div class="w3ls_logo_products_left">
				<a href="./index.php"><img src="./images/ace_logo.png" class="logo" alt=""></a>
			</div>
		
			
			<div class="clearfix"> </div>
		</div>
	</div>
	
<!-- //header -->
