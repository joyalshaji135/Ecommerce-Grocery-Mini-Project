<?php

include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>

<?php

include('./Layouts/header.php');

?>

<?php

include('./Layouts/navbar.php');

?>
<!--- products --->
<div class="products">
	<div class="container">
		<div class="col-md-3 products-left">

			<?php
			side_navbar();
			?>


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







			<?php
			get_search_products();


			?>










			<!--  <nav class="numbering">
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

<?php

include('./Layouts/footer.php');

?>