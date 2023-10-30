<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();



if(isset($_POST['add_to_cart']))
{
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_current_price'];
    $quantity=$_POST['product_qantity'];
    $get_ip_address=getIPAddress();
    
    /* $_SESSION['cart']=array('product_id'=>$product_id,'product_name'=>$product_name,
    'product_price'=>$product_price,'product_quantity'=>$quantity); */
	$select_query="Select * from add_to_cart_tbl where ip_address='$get_ip_address' and product_id=$product_id";
	$result_query=mysqli_query($con,$select_query);
	$num_of_rows=mysqli_num_rows($result_query);
	if($num_of_rows>0){
	 echo "<script>alert('This Item is already present in cart')</script>";
	 echo "<script>window.open('index.php','_self')</script>";
	}
	elseif($quantity=='')
    {
          echo "<script>alert('Please Fill the Quantity')</script>";
          echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
	  $insert_query="insert into add_to_cart_tbl (product_id,ip_address,quantity)
	   values ($product_id,'$get_ip_address',$quantity)";
	   $result_query=mysqli_query($con,$insert_query);
	   echo "<script>alert('Item is added to cart')</script>";
	   echo "<script>window.open('index.php','_self')</script>";
	}
}

?>

<!-- Including Header Files Start -->
<?php

include('./Layouts/header.php');

?>
<!-- Including Header Files End -->

<!-- Including Navbar Files Start -->

<?php

include('./Layouts/navbar.php');

?>

<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Cart Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- breadcrumbs -->


<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span><?php add_to_cart_number(); ?> Products</span></h2>

            <form action="" method="post">
			<div class="checkout-right">
				<table class="timetable_sub">


                <?php
                                             global $con;
                                             $total=0;
                                             $get_ip_address=getIPAddress();
                                             $select_query="Select * from add_to_cart_tbl";
                                             $result_query=mysqli_query($con,$select_query);
                                             $row_count_cart=mysqli_num_rows($result_query);
                                             if($row_count_cart>0)
                                             {
                                               echo "<thead>
                                                 <th>Product Title</th>
                                                 <th>Product Image</th>
                                                 <th>Product Quantity</th>
                                                 <th>Product Price</th>
                                                 <th>Total Price</th>
                                                 <th>Remove</th>
                                                 <th>Opeartion</th>
                                             </thead>";
                                                  while($row=mysqli_fetch_array($result_query))
                                                  {
                                                        $product_id=$row['product_id'];
                                                        $quantity=$row['quantity'];
                                                        $select_product="Select * from product_tbl where product_id=$product_id";
                                                        $result_product=mysqli_query($con,$select_product);
                                                            while($row_product_price=mysqli_fetch_array($result_product)){
                                                                $product_price=array($row_product_price['product_current_price']);
                                                                $price_table=$row_product_price['product_current_price'];
                                                                $product_name=$row_product_price['product_name'];
                                                                $product_image=$row_product_price['product_image'];
                                                                $product_value=array_sum($product_price);
                                                                $product_qua=$quantity*$price_table;
                                                                $total+=$quantity*$price_table;
                                            ?>
   
   <tr class="rem1">
						<td class="invert"><?php 
                                                            echo $product_name 
                                                        ?></td>
						<td class="invert-image"><a href="./single_product_page.php?product_id=<?php echo $product_id ?>"><img src="./Admin Panel/Product_Image/<?php 
                                                            echo $product_image
                                                        ?>" alt=" " class="cart_img" /></a></td>
						<td class="invert">
						<input type="text" value="<?php echo $quantity ?>" readonly="readonly" class="form-input w-50 text-center">
						</td>
                        <td class="invert">
                            <?php echo $price_table; ?>
                        </td>
                        <td class="invert"><?php echo $product_qua ?></td>
                        <td class="invert">
						<input type="checkbox" name="removeitem[]" value="<?php 
                                                    echo $product_id;  
                                                ?>">
						</td>

                        <td class="invert">
                        
                        <input type='submit' name="remove_cart" class='btn btn-primary mb-2 px-4 border border-dark' 
                        value="Remove Cart">
						
						
						</td>
					</tr>
                    <?php }
											}
                                                }
                                                  else{
                                                    echo "<h1 class='text-center text-danger'>Cart is an Empty</h1>";
                                                  }
                                                  ?>
</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Total Price</h4>
                    <ul>
						
						
						



						<?php 
                                     
                                     
                                     $select_total_query="Select * from add_to_cart_tbl";
                                     $result_total_query=mysqli_query($con,$select_total_query);
                                     $row_cart=mysqli_num_rows($result_total_query);
                                     if($row_cart>0)
                                     {
                                        echo "<li>Total <i>-</i> <span>₹ $total</span></li>
										<br>
										<br>
                                               
                                                <a href='checkout.php' class='btn btn-primary mb-2 px-4 border border-dark'>Checkount</a> 
                                                 <input type='submit' name='continue_shopping' class='btn btn-primary mb-2 px-4 border border-dark' 
                                                 value='Continue Shopping'>";
                                     }else
                                     {
                                        echo "<input type='submit' name='continue_shopping' class='btn btn-primary mb-2 px-4 border border-dark' 
                                        value='Continue Shopping'>";
                                     }
                                            if(isset($_POST['continue_shopping']))
                                            {
                                                echo "<script>window.open('all_product.php','_self')</script>";
                                            }
                                    ?>
									</div>
		</div><!-- HTML !-->

	</div> 
</div>
</form>

<!--Start Function To Remove item --> 
<?php
                function remove_items()
                {
                    global $con;
                    if(isset($_POST['remove_cart']))
                    {
                        foreach($_POST['removeitem'] as $remove_id)
                        {
                            echo $remove_id;
                            $delete_query="Delete from add_to_cart_tbl where product_id=$remove_id";
                            $run_delete_query=mysqli_query($con,$delete_query);
                            if($run_delete_query)
                            {
                                echo "<script>window.open('add_to_cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_item=remove_items();



                ?>


                <!-- End Function to Remove Item -->
<!-- //checkout -->

<!-- Footer Files add Start -->

<?php

include('./Layouts/footer.php');

?>