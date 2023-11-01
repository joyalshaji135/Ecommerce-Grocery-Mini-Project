<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>



<!-- Header File Including -->
<?php

include('./Layouts/header.php');

?>

<!-- navigation -->
<?php

include('./Layouts/navbar.php');

?>

<!-- //navigation -->


<!-- main-slider -->
<ul id="demo1">
	<li>
		<img src="images/11.jpg" alt="" />
		<!--Slider Description example-->
		<div class="slide-desc">
			<h3>Buy Rice Products Are Now On Line With Us</h3>
		</div>
	</li>
	<li>
		<img src="images/22.jpg" alt="" />
		<div class="slide-desc">
			<h3>Whole Spices Products Are Now On Line With Us</h3>
		</div>
	</li>

	<li>
		<img src="images/44.jpg" alt="" />
		<div class="slide-desc">
			<h3>Whole Spices Products Are Now On Line With Us</h3>
		</div>
	</li>
</ul>
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h2>Top selling offers</h2>
		<div class="grid_3 grid_5">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Today Offers</a></li>
					<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Advertised offers</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
						<div class="agile-tp">
							<h5>This week</h5>
							<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
						</div>
						<div class="agile_top_brands_grids">

							<?php

							offer_products();

							?>




							<div class="clearfix"> </div>
						</div>
					</div>







					<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
						<div class="agile-tp">
							<h5>Advertised this week</h5>
							<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
						</div>
						<div class="agile_top_brands_grids">


							<?php
							/* discount_products() */
							?>
							<!-- insert top selling proucts -->




							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //top-brands -->
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<a href="beverages.html"> <img class="first-slide" src="images/b1.jpg" alt="First slide"></a>

		</div>
		<div class="item">
			<a href="personalcare.html"> <img class="second-slide " src="images/b3.jpg" alt="Second slide"></a>

		</div>
		<div class="item">
			<a href="household.html"><img class="third-slide " src="images/b1.jpg" alt="Third slide"></a>

		</div>
	</div>

</div><!-- /.carousel -->
<!--banner-bottom-->
<div class="ban-bottom-w3l">
	<div class="container">
		<div class="col-md-6 ban-bottom3">
			<div class="ban-top">
				<img src="images/p2.jpg" class="img-responsive" alt="" />

			</div>
			<div class="ban-img">
				<div class=" ban-bottom1">
					<div class="ban-top">
						<img src="images/p3.jpg" class="img-responsive" alt="" />

					</div>
				</div>
				<div class="ban-bottom2">
					<div class="ban-top">
						<img src="images/p4.jpg" class="img-responsive" alt="" />

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6 ban-bottom">
			<div class="ban-top">
				<img src="images/111.jpg" class="img-responsive" alt="" />


			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
<!--banner-bottom-->
<!--brands-->
<div class="brands">
	<div class="container">
		<h3>Brand Store</h3>
		<?php

		brands();

		?>

		<!-- <div class="clearfix"></div>
			</div> -->
	</div>
</div>
<!--//brands-->
<!-- new -->
<div class="newproducts-w3agile">
	<div class="container">
		<h3>New offers</h3>
		<?php
		new_offer_product();
		?>
	</div>
</div>
<!-- //new -->
<!-- Footer Php Code Including -->
<?php

include('./Layouts/footer.php')

?>