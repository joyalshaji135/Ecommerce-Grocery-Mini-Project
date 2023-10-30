<?php
  include('./Connection/db_connection.php');
?>
<form action="" method="post"></form>
<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Koattayam ,Challukunne <span>Kottayam City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="joyalshaji755@gmail.com">joyalshaji755@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+91 8590343392</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<?php
						footer_category();	
				?>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="profile.php">Profile</a></li>

						<?php
                           
						   if(!isset($_SESSION['username']))
						   {
							   echo "<li><i class='fa fa-arrow-right' aria-hidden='true'></i><a href='login.php'>Login</a></li>";
						   }else
						   {
							   echo "<li><i class='fa fa-arrow-right' aria-hidden='true'></i><a href='logout.php'>Logout</a></li>";
						   }

						?>



						

						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.php">Create Account</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa-brands fa-facebook"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa-brands fa-twitter"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa-brands fa-dribbble"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa-brands fa-vimeo"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
				/* var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				}; */
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner -->

</body>
</html>