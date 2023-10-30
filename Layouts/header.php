<?php

include('./Connection/db_connection.php');
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
.top_brand_left {
    float: left;
    width: 33.33%;
	margin-bottom: 25px;
}
.top_brand_left-1 {
    width: 25%;
    float: left;
    margin-bottom: 25px;
}
.w3layouts-brand {
    float: left;
    width: 33.33%;
	margin-bottom: 10px;
}
img.product_image {
    height: 130px;
    width: 130px;
}

.checkout-right-basket a {
    padding: 10px 30px;
    color: #fff;
    font-size: 1em;
    background: #212121;
    text-decoration: none;
}
.cart_img
                {
                    width: 80px;
                    height: 80px;
                    object-fit: contain;
                }

				<!-- HTML !-->
<button class="button-18" role="button">Button 18</button>

/* CSS */
.button-18 {
  align-items: center;
  background-color: #0A66C2;
  border: 0;
  border-radius: 100px;
  box-sizing: border-box;
  color: #ffffff;
  cursor: pointer;
  display: inline-flex;
  font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 20px;
  max-width: 480px;
  min-height: 40px;
  min-width: 0px;
  overflow: hidden;
  padding: 0px;
  padding-left: 20px;
  padding-right: 20px;
  text-align: center;
  touch-action: manipulation;
  transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
}

.button-18:hover,
.button-18:focus { 
  background-color: #16437E;
  color: #ffffff;
}

.button-18:active {
  background: #09223b;
  color: rgb(255, 255, 255, .7);
}

.button-18:disabled { 
  cursor: not-allowed;
  background: rgba(0, 0, 0, .08);
  color: rgba(0, 0, 0, .3);
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
					}else
					{
						echo "<li><a href='./logout.php'>Logout</a></li>";
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
			<div class="product_list_header">  
						<a class="cart" href="add_to_cart.php"><i class="fa-solid fa-cart-plus"></i><sup class="text-light">
				<?php
				
				add_to_cart_number();

				?>
          </sup></a>
					  
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
	 <?php

	 if(isset($_GET['add_to_cart']))
{
	
	$get_ip_address=getIPAddress();
	$get_product_id=$_GET['add_to_cart'];
	$select_query="Select * from add_to_cart_tbl where product_id=$get_product_id";
	$result_query=mysqli_query($con,$select_query);
	$num_of_rows=mysqli_num_rows($result_query);
	if($num_of_rows>0){
	 echo "<script>alert('This Item is already present in cart')</script>";
	 echo "<script>window.open('index.php','_self')</script>";
	}
	else{
	  $insert_query="insert into add_to_cart_tbl (product_id,ip_address,quantity)
	   values ($get_product_id,'$get_ip_address',0)";
	   $result_query=mysqli_query($con,$insert_query);
	   echo "<script>alert('Item is added to cart')</script>";
	   echo "<script>window.open('index.php','_self')</script>";
	}
}
	?>
<!-- //header -->