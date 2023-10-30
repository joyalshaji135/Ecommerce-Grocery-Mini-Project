<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>
<!-- Including Header File -->
<?php
include('./Layouts/header.php');
?>
<!-- Including Navigation Bar File -->
<?php

include('./Layouts/navbar.php');

?>
		
<!-- //navigation -->


<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-3 products-left">
            
			<!-- Calling the Side Navbar Function ==> get_all_products() in common_function.php Start --> 

                    <?php
                    side_navbar();
					
                    ?>
     
              
			<!-- Calling the Side Navbar Function ==> get_all_products() in common_function.php End --> 

                    																																												
			</div>
			<div class="col-md-9 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
						</div>
						<div class="sorting-left">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

<!-- Calling the Category and Sub_Category Products Function ==> get_uniq_category(),get_uniq_sub_category() in common_function.php Start --> 
				
				<?php


						get_uniq_category();
						get_uniq_sub_category();

				?>

<!-- Calling the Category and Sub_Category Products Function ==> get_uniq_category(),get_uniq_sub_category() in common_function.php Start --> 

				<!-- <nav class="numbering">
					<ul class="pagination paging">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

<!--- Products End --->


<!-- Including Footer File Start-->

<?php
include('./Layouts/footer.php')
?>

<!-- Including Footer File Start-->
