<!-- Pagination code -->
<?php
$num=mysqli_num_rows($result_product_query);
  $numberpages=9;
  $totalpages=ceil($num/$numberpages);
  
  echo "<div class='row'>
	<div class='col-md-10'></div>
	<div class='col-md-2'>";
  for($btn=1;$btn<=$totalpages;$btn++){
	echo '<button>&nbsp
  <a href="all_product.php?page='.$btn.'" class="text-dark">'.$btn.'
  </a></button>';
  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }else
  {
    $page=1;
  }
}
	echo "</div> </div>";
  $startinglimit=($page-1)*$numberpages;
  $select_product_query="select * from product_tbl limit " 
  .$startinglimit.','.$numberpages;  //Change this order by Concept
  $result_product_query=mysqli_query($con,$select_product_query);
  ?>



<label class="control-label">Card Number</label>
                    <input class="number credit-card-number form-control" type="text" name="number"
                                  inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number"
                                  placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                </div>
            </div>
            <div class="w3_agileits_card_number_grid_right">
                <div class="controls">
                    <label class="control-label">CVV</label>
                    <input class="security-code form-control"Â·
                                  inputmode="numeric"
                                  type="text" name="security-code"
                                  placeholder="&#149;&#149;&#149;">
                </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="controls">
            <label class="control-label">Expiration Date</label>
            <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
        </div>
    </div>
    <button class="submit"><span>Make a payment </span></button>
</div>