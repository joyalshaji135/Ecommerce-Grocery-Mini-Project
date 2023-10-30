<!-- Including Connection in PHP Start -->

<?php
        include('./Connection/db_connection.php');
        include('./Functions/common_function.php');
		session_start();
?>

<!-- Including Connection in PHP End -->


<!-- including Header Files in PHP Start-->

<?php

include('./Layouts/header.php');

?>

<!-- including Header Files in PHP Start-->


<!-- including Header Navbar Files in PHP Start-->

<?php

include('./Layouts/navbar.php');

?>

<!-- including Header Navbar Files in PHP End-->

<!--- Products Start --->
<div class="products">
		<div class="container">
			<div class="col-md-3 products-left">

            <!-- Calling the Side Navbar Function ==> get_side_navbar() in common_function.php Start --> 

                    <?php
                    side_navbar();
                    ?>
                    
            <!-- Calling the Side Navbar Function ==> get_side_navbar() in common_function.php End -->

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

 <!-- Calling the Side Navbar Function ==> get_all_products() in common_function.php Start --> 

<?php

        all_products();

?>



<!-- Calling the Side Navbar Function ==> get_all_products() in common_function.php End --> 

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

	<!-- Including Footer File in PHP Start -->

<?php

include('./Layouts/footer.php');

?>

<!-- Including Footer File in PHP Start -->