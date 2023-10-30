<?php


 /* Including Database Connection Function */
 
 /* include('./Connection/db_connection.php'); */


/* Php One Tire Programming "new_offer_product" Function Created */
 function new_offer_product()
 {
   global $con;
   if(!isset($_GET['category'])){
    if(!isset($_GET['sub_category'])){
  $select_product_query="select * from product_tbl order by rand() LIMIT 0,8";  //Change this order by Concept
  $result_product_query=mysqli_query($con,$select_product_query);
  while($product_row=mysqli_fetch_assoc($result_product_query))
  {
    $product_id=$product_row['product_id'];
    $product_name=$product_row['product_name'];
    $product_image=$product_row['product_image'];
    $product_actual_price=$product_row['product_actual_price']; 
    $product_current_price=$product_row['product_current_price'];
    $product_offer=$product_row['product_offer']; 
    $category_id=$product_row['category_id'];
    $sub_category_id=$product_row['sub_category_id'];
    echo "<div class='agile_top_brands_grids'>
    <div class='col-md-4 top_brand_left-1'>
    <div class='hover14 column'>
      <div class='agile_top_brand_left_grid'>
        <div class='agile_top_brand_left_grid_pos'>
          <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
        </div>
        <div class='agile_top_brand_left_grid1'>
          <figure>
            <div class='snipcart-item block'>
              <div class='snipcart-thumb'>
                <a href='single_product_page.php?product_id=$product_id'>
                <img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
                <p>$product_name</p>
                <form action='add_to_cart.php' method='post'>
                <div class='stars'>
                   <input type='hidden' name='product_id' value='$product_id'>
                   <input type='hidden' name='product_name' value='$product_name'>
                   <input type='hidden' name='product_current_price' value='$product_actual_price'>
                   <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                   </div>
                   <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                 </div>
                 <div class='snipcart-details top_brand_home_details'>
                 <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                 <br>
                 <br>
                       <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
               </form>
              </div>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </div>
  </div>";
  }}}}

/* Todays Offer Products */

function offer_products()
{
  global $con;
  $select_product_discount_query="select * from product_tbl order by product_offer desc 
									limit 6";
									$result_query=mysqli_query($con,$select_product_discount_query);
									while($product_row=mysqli_fetch_assoc($result_query))
									{
									  $product_id=$product_row['product_id'];
									  $product_name=$product_row['product_name'];
									  $product_image=$product_row['product_image'];
									  $product_actual_price=$product_row['product_actual_price']; 
									  $product_current_price=$product_row['product_current_price'];
									  $product_offer=$product_row['product_offer']; 
									  $category_id=$product_row['category_id'];
									  $sub_category_id=$product_row['sub_category_id'];
									 echo "<div class='col-md-4 top_brand_left'>
									 <div class='hover14 column'>
										 <div class='agile_top_brand_left_grid'>
											 <div class='agile_top_brand_left_grid_pos'>
											 <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
											 </div>
											 <div class='agile_top_brand_left_grid1'>
												 <figure>
													 <div class='snipcart-item block' >
														 <div class='snipcart-thumb'>
															 <a href='single_product_page.php?product_id=$product_id'>
															 <img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
															 <p>$product_name</p>
															 <form action='add_to_cart.php' method='post'>
                               <div class='stars'>
                                  <input type='hidden' name='product_id' value='$product_id'>
                                  <input type='hidden' name='product_name' value='$product_name'>
                                  <input type='hidden' name='product_current_price' value='$product_actual_price'>
                                  <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                                  </div>
                                  <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                                </div>
                                <div class='snipcart-details top_brand_home_details'>
                                <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                                      <br><br>
                                      <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
                              </form>
													 </div>
													 </div>
												 </figure>
											 </div>
										 </div>
									 </div>
								 </div>";
									}
}


/* function discount_products()
{
  global $con;
  $select_product_discount_query="select * from product_tbl order by product_offer asce 
									limit 6";
									$result_query=mysqli_query($con,$select_product_discount_query);
									while($product_row=mysqli_fetch_assoc($result_query))
									{
									  $product_id=$product_row['product_id'];
									  $product_name=$product_row['product_name'];
									  $product_image=$product_row['product_image'];
									  $product_actual_price=$product_row['product_actual_price']; 
									  $product_current_price=$product_row['product_current_price'];
									  $product_offer=$product_row['product_offer']; 
									  $category_id=$product_row['category_id'];
									  $sub_category_id=$product_row['sub_category_id'];
									 echo "<div class='col-md-4 top_brand_left'>
									 <div class='hover14 column'>
										 <div class='agile_top_brand_left_grid'>
											 <div class='agile_top_brand_left_grid_pos'>
											 <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
											 </div>
											 <div class='agile_top_brand_left_grid1'>
												 <figure>
													 <div class='snipcart-item block' >
														 <div class='snipcart-thumb'>
															 <a href='single_product_page.php?product_id=$product_id'>
															 <img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
															 <p>$product_name</p>
															 <form action='add_to_cart.php' method='post'>
                               <div class='stars'>
                                  <input type='hidden' name='product_id' value='$product_id'>
                                  <input type='hidden' name='product_name' value='$product_name'>
                                  <input type='hidden' name='product_current_price' value='$product_actual_price'>
                                  <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                                  </div>
                                  <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                                </div>
                                <div class='snipcart-details top_brand_home_details'>
                                <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                                      <br><br>
                                      <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
                              </form>
													 </div>
													 </div>
												 </figure>
											 </div>
										 </div>
									 </div>
								 </div>";
									}
} */
/* All Product Display in all_product.php Funtion all_products() */

function all_products()
 {
   global $con;
   if(!isset($_GET['category'])){
    if(!isset($_GET['sub_category'])){
  $select_product_query="select * from product_tbl";  //Change this order by Concept
  $result_product_query=mysqli_query($con,$select_product_query);
  $num=mysqli_num_rows($result_product_query);
  $numberpages=12;
  $totalpages=ceil($num/$numberpages);
  echo "<div class='row'>
	<div class='col-md-5'></div>
	<div class='col-md-7'>";
  for($btn=1;$btn<=$totalpages;$btn++){
	echo '&nbsp<button class="btn btn-secondary text-dark mx-1">
  <a href="all_product.php?page='.$btn.'" class="text-decoration-none">'.$btn.'
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
  while($product_row=mysqli_fetch_assoc($result_product_query))
  {
    $product_id=$product_row['product_id'];
    $product_name=$product_row['product_name'];
    $product_image=$product_row['product_image'];
    $product_actual_price=$product_row['product_actual_price']; 
    $product_current_price=$product_row['product_current_price'];
    $product_offer=$product_row['product_offer']; 
    $category_id=$product_row['category_id'];
    $sub_category_id=$product_row['sub_category_id'];
    echo "<div class='agile_top_brands_grids'>
    <div class='col-md-4 top_brand_left'>
      <div class='hover14 column'>
        <div class='agile_top_brand_left_grid'>
          <div class='agile_top_brand_left_grid_pos'>
          <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
          </div>
          <div class='agile_top_brand_left_grid1'>
            <figure>
              <div class='snipcart-item block'>
                <div class='snipcart-thumb'>
                <a href='single_product_page.php?product_id=$product_id'><img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
                <p>$product_name</p>
                <form action='add_to_cart.php' method='post'>
                               <div class='stars'>
                                  <input type='hidden' name='product_id' value='$product_id'>
                                  <input type='hidden' name='product_name' value='$product_name'>
                                  <input type='hidden' name='product_current_price' value='$product_actual_price'>
                                  <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                                  </div>
                                  <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                                </div>
                                <div class='snipcart-details top_brand_home_details'>
                                <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                                      <br><br>
                                      <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
                              </form>
                </div>
              </div>
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>";
    }
  
  }
 }
}



/* Category Wise Product Display */


function get_uniq_category()
{
  global $con;
  if(isset($_GET['category_id'])){
    $category_id=$_GET['category_id'];
 $select_product_query="select * from product_tbl where category_id=$category_id";  //Change this order by Concept
 $result_product_query=mysqli_query($con,$select_product_query);
 $num_of_rows=mysqli_num_rows($result_product_query);
    if($num_of_rows==0){
     echo "<h2 class='text-danger text-center'>No Stock For Avilable In Categorys </h2>";
    }
 while($product_row=mysqli_fetch_assoc($result_product_query))
 {
   $product_id=$product_row['product_id'];
   $product_name=$product_row['product_name'];
   $product_image=$product_row['product_image'];
   $product_actual_price=$product_row['product_actual_price']; 
   $product_current_price=$product_row['product_current_price'];
   $product_offer=$product_row['product_offer']; 
   $category_id=$product_row['category_id'];
   $sub_category_id=$product_row['sub_category_id'];
   echo "<div class='agile_top_brands_grids'>
   <div class='col-md-4 top_brand_left'>
     <div class='hover14 column'>
       <div class='agile_top_brand_left_grid'>
         <div class='agile_top_brand_left_grid_pos'>
         <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
         </div>
         <div class='agile_top_brand_left_grid1'>
           <figure>
             <div class='snipcart-item block'>
               <div class='snipcart-thumb'>
               <a href='single_product_page.php?product_id=$product_id'><img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
               <p>$product_name</p>
               <form action='add_to_cart.php' method='post'>
                               <div class='stars'>
                                  <input type='hidden' name='product_id' value='$product_id'>
                                  <input type='hidden' name='product_name' value='$product_name'>
                                  <input type='hidden' name='product_current_price' value='$product_actual_price'>
                                  <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                                  </div>
                                  <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                                </div>
                                <div class='snipcart-details top_brand_home_details'>
                                <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                                      <br><br>
                                      <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
                              </form>
               </div>
             </div>
           </figure>
         </div>
       </div>
     </div>
   </div>
 </div>";
   }

}
}

/* Category Wise Product Display */

function get_uniq_sub_category()
{
  global $con;
  if(isset($_GET['sub_category_id'])){
    $sub_category_id=$_GET['sub_category_id'];
 $select_product_query="select * from product_tbl where sub_category_id=$sub_category_id";  //Change this order by Concept
 $result_product_query=mysqli_query($con,$select_product_query);
 $num_of_rows=mysqli_num_rows($result_product_query);
    if($num_of_rows==0){
     echo "<h2 class='text-danger text-center'>No Stock For Avilable In Sub-Categorys </h2>";
    }
 while($product_row=mysqli_fetch_assoc($result_product_query))
 {
   $product_id=$product_row['product_id'];
   $product_name=$product_row['product_name'];
   $product_image=$product_row['product_image'];
   $product_actual_price=$product_row['product_actual_price']; 
   $product_current_price=$product_row['product_current_price'];
   $product_offer=$product_row['product_offer']; 
   $category_id=$product_row['category_id'];
   $sub_category_id=$product_row['sub_category_id'];
   echo "<div class='agile_top_brands_grids'>
   <div class='col-md-4 top_brand_left'>
     <div class='hover14 column'>
       <div class='agile_top_brand_left_grid'>
         <div class='agile_top_brand_left_grid_pos'>
         <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
         </div>
         <div class='agile_top_brand_left_grid1'>
           <figure>
             <div class='snipcart-item block'>
               <div class='snipcart-thumb'>
               <a href='single_product_page.php?product_id=$product_id'><img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
               <p>$product_name</p>
               <form action='add_to_cart.php' method='post'>
                               <div class='stars'>
                                  <input type='hidden' name='product_id' value='$product_id'>
                                  <input type='hidden' name='product_name' value='$product_name'>
                                  <input type='hidden' name='product_current_price' value='$product_actual_price'>
                                  <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                                  </div>
                                  <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                                </div>
                                <div class='snipcart-details top_brand_home_details'>
                                <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                                      <br><br>
                                      <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
                              </form>
               </div>
             </div>
           </figure>
         </div>
       </div>
     </div>
   </div>
 </div>";
   }

}
}

/* Searching Products For Category and Sub_Category wise */

function get_search_products(){
global $con;
if(isset($_GET['search_data_product'])){
  $search_data_value=$_GET['search_data'];
$search_query="select * from product_tbl where product_keyword like '%$search_data_value%'";
  $result_search_query=mysqli_query($con,$search_query);
  while($product_row=mysqli_fetch_assoc($result_search_query))
  {
    $product_id=$product_row['product_id'];
    $product_name=$product_row['product_name'];
    $product_image=$product_row['product_image'];
    $product_actual_price=$product_row['product_actual_price']; 
    $product_current_price=$product_row['product_current_price'];
    $product_offer=$product_row['product_offer']; 
    $category_id=$product_row['category_id'];
    $sub_category_id=$product_row['sub_category_id'];
    echo "<div class='agile_top_brands_grids'>
    <div class='col-md-4 top_brand_left'>
      <div class='hover14 column'>
        <div class='agile_top_brand_left_grid'>
          <div class='agile_top_brand_left_grid_pos'>
          <h4 class='text-success'>$product_offer%</h4><img src='images/offer.png' alt='' class='img-responsive'>
          </div>
          <div class='agile_top_brand_left_grid1'>
            <figure>
              <div class='snipcart-item block'>
                <div class='snipcart-thumb'>
                <a href='single_product_page.php?product_id=$product_id'><img title='' alt='' class='product_image' src='./Admin Panel/Product_Image/$product_image'></a>		
                <p>$product_name</p>
                <form action='add_to_cart.php' method='post'>
                <div class='stars'>
                   <input type='hidden' name='product_id' value='$product_id'>
                   <input type='hidden' name='product_name' value='$product_name'>
                   <input type='hidden' name='product_current_price' value='$product_actual_price'>
                   <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                   </div>
                   <h4>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
                 </div>
                 <div class='snipcart-details top_brand_home_details'>
                 <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
                       <br><br>
                       <a href='single_product_page.php?product_id=$product_id' class='btn btn-primary form-control'>View More</a>
               </form>
                </div>
              </div>
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>";
    }
 }
}




/* Php One Tire Programming "side_navbar()" Function Created  Category and SubCategory Side Navbar in Product Page and cat,sub-cat Pages*/

function side_navbar()
{
  global $con;
  $select_query = "select c.category_id,sub_category_id,category_name,group_concat(s.sub_category_name) as 
  sublist,group_concat(s.sub_category_id) as sublist_id from category_tbl as c left join sub_category_tbl as s on c.category_id = s.category_id group by c.category_id order by c.category_name";
              $result_query=mysqli_query($con,$select_query);
              echo "<div class='categories'>
                  <h2>Categories</h2>";
                  echo "<ul class='cate'>";
              while($data=mysqli_fetch_array($result_query))
              {
                
                  $category_id=$data['category_id'];
                  $sub_category_id=$data['sub_category_id']; 
                  $category_name=$data['category_name'];
                  
                  echo "<li><a href='cat_and_sub_cat.php?category_id=$category_id'><i class='fa fa-arrow-right' aria-hidden='true'>
                  </i>$category_name</a></li>";
                  $sub_category_list = explode(",", $data['sublist']);
                  $sub_category_id = explode(",", $data['sublist_id']);
                  foreach($sub_category_list as $k => $x)
                  {
                    $y =$sub_category_id[$k];
                    echo "<ul>";
                    echo "<li><a href='cat_and_sub_cat.php?sub_category_id=$y'><i class='fa fa-arrow-right' aria-hidden='true'>
                    </i>$x</a></li>";
                    echo "</ul>";
                    
                  }
                  
              }
              echo "</ul>";
              echo "</div>";
}

//DropDown Nav Bar Display
function category_and_subcategory_dropdown()
{
  global $con;
  $select_query = "select c.category_id,category_name,group_concat(s.sub_category_name) 
									as sublist,group_concat(s.sub_category_id) as sublist_id from category_tbl as c left join
								sub_category_tbl as s on c.category_id = s.category_id group by c.category_id order by c.category_name";
								$result_query=mysqli_query($con,$select_query);
								
								while($data=mysqli_fetch_array($result_query))
								{
									$category_id=$data['category_id'];
 						      //$sub_category_id=$data['sub_category_id']; 
 						    	$category_name=$data['category_name'];
									echo "<li class='dropdown'>";
									echo "<a href='cat_and_sub_cat.php?category_id=$category_id' class='dropdown-toggle' data-toggle='dropdown'>
								  $category_name<b class='caret'></b></a>";
									$sub_category_list = explode(",", $data['sublist']);
                  $sub_category_id = explode(",", $data['sublist_id']);
									echo "<ul class='dropdown-menu multi-column columns-3'>
								  <div class='row'>
									<div class='multi-gd-img'>
									<ul class='multi-column-dropdown'>";
									 echo "<h6>All $category_name</h6>";
                   foreach ($sub_category_list AS $k => $x) {
                    $y =$sub_category_id[$k];
                    echo "<li><a href='cat_and_sub_cat.php?sub_category_id=$y'>$x</a></li>";
                   }

									echo "</ul></div></div></ul>";
									  echo "</li>";
								}

}


//Footer Category Displaying Function
 function footer_category()
 {
  global $con;
  $select_categorys="select * from category_tbl order by rand() LIMIT 0,5";
						$result_categorys=mysqli_query($con,$select_categorys);
						echo "<ul class='info'>";
						while($row_categorys=mysqli_fetch_assoc($result_categorys))
						{
								$category_title=$row_categorys['category_name'];
								$category_id=$row_categorys['category_id'];
								echo "<li><i class='fa fa-arrow-right' aria-hidden='true'>
								</i><a href='cat_and_sub_cat.php?category_id=$category_id'>$category_title</a></li>";
								
						}
						echo "</ul>";
 }



/* Display All Brands in Sub_Category */

function brands()
{
  global $con;
  $select_sub_categorys="select * from sub_category_tbl order by rand() LIMIT 0,12";
						$result_sub_categorys=mysqli_query($con,$select_sub_categorys);
						
						while($row_sub_categorys=mysqli_fetch_assoc($result_sub_categorys))
						{
								$sub_category_title=$row_sub_categorys['sub_category_name'];
								$sub_category_id=$row_sub_categorys['sub_category_id'];
								echo "<div class='brands-agile'>";
								echo "<div class='col-md-2 w3layouts-brand'>";
								echo "<div class='brands-w3l'>";
								echo "<p><a href='cat_and_sub_cat.php?sub_category_id=$sub_category_id'>$sub_category_title</a></p>";
								echo "</div>";
								echo "</div>";
								echo "</div>";				
						}
}

//Display View More in Single Product

function view_more()
{
  global $con;
  if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
     if(!isset($_GET['sub_category'])){
      $product_id=$_GET['product_id'];
     $select_product_query="select * from product_tbl where product_id=$product_id";  //Change this order by Concept
     $result_product_query=mysqli_query($con,$select_product_query);
     while($product_row=mysqli_fetch_assoc($result_product_query))
     {
     $product_id=$product_row['product_id'];
     $product_name=$product_row['product_name'];
     $product_discription=$product_row['product_description'];
     $product_image=$product_row['product_image'];
     $product_actual_price=$product_row['product_actual_price']; 
     $product_current_price=$product_row['product_current_price'];
     $product_offer=$product_row['product_offer']; 
     $category_id=$product_row['category_id'];
     $sub_category_id=$product_row['sub_category_id'];
     echo "<div class='products'>
     <div class='container'>
       <div class='agileinfo_single'>
         
         <div class='col-md-4 agileinfo_single_left'>
           <img id='example' src='./Admin Panel/Product_Image/$product_image' alt=' ' class='img-responsive'>
         </div>		
         <div class='col-md-8 agileinfo_single_right'>
         <h2>$product_name</h2>
           <div class='w3agile_description'>
             <h4>Description :</h4>
             <p>$product_discription</p>
           </div>
           <form action='add_to_cart.php' method='post'>
                
                   <input type='hidden' name='product_id' value='$product_id'>
                   <input type='hidden' name='product_name' value='$product_name'>
                   <input type='hidden' name='product_current_price' value='$product_actual_price'>
                   <div class='col-xs-4'>
                   <input type='number' name='product_qantity' class='text-center form-control' min='1' max='10' placeholder='Quantity' >
                   </div>
                   <br>
                   <br>
                   <br>
                   <div class='snipcart-item block'>
             <div class='snipcart-thumb agileinfo_single_right_snipcart'>
               <h4 class='m-sing'>₹ $product_current_price <span>₹ $product_actual_price</span></h4>
             </div>
             <div class='snipcart-details agileinfo_single_right_details'>
             <input type='submit' name='add_to_cart' class='btn btn-primary form-control' value='Add to Cart'>
             </div>
             </form>
           </div>
         </div>
         <div class='clearfix'> </div>
       </div>
     </div>";
     }
    }
   }
   }
  
}

//Add to Cart in database Function 

function add_to_cart()
{
  global $con;
  if(isset($_GET['add_to_cart']))
{
	$get_ip_address=getIPAddress();
	$get_product_id=$_GET['add_to_cart'];
	$select_query="Select * from add_to_cart_tbl where ip_address='$get_ip_address' and product_id=$get_product_id";
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
}

//Number Of Items Will be Added into Cart

function add_to_cart_number(){
  if(isset($_GET['add_to_cart']))
    {
        global $con;
        $get_ip_address=getIPAddress();
        $select_query="Select * from add_to_cart_tbl where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    else
    {
        global $con;
        $get_ip_address=getIPAddress();
        $select_query="Select * from add_to_cart_tbl where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    
}


//Total Price Of Cart Items

function total_cart_price()
{
     global $con;
         $get_ip_address=getIPAddress();
         $total=0;
         $select_query="Select * from add_to_cart_tbl where ip_address='$get_ip_address'";
         $result_query=mysqli_query($con,$select_query);
              while($row=mysqli_fetch_array($result_query))
              {
                    $product_id=$row['product_id'];
                    $select_product="Select * from product_tbl where product_id=$product_id";
                    $result_product=mysqli_query($con,$select_product);
                        while($row_product_price=mysqli_fetch_array($result_product)){
                            $product_price=array($row_product_price['product_current_price']);
                            $product_value=array_sum($product_price);
                            $total+=$product_value;
                        }
              }
              echo $total;

}

//Pending Order Details Function
function get_user_order_details()
{
  global $con;
  $username=$_SESSION['username'];
  $get_details_query="select * from user_registration where username='$username'";
  $result_query=mysqli_query($con,$get_details_query);
  while($row_query=mysqli_fetch_array($result_query))
  {
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_order'])){
        if(!isset($_GET['delete_account'])){
          $get_order_query="select * from user_order_tbl where user_id=$user_id and order_status='pending'";
          $result_get_order_query=mysqli_query($con,$get_order_query);
          $row_count=mysqli_num_rows($result_get_order_query);
          if($row_count>0){
            echo "<h2 class='rounded text-center border border-dark bg-white text-dark'>
                You Have $row_count Pending Orders
            </h2>
            <br>
          <center>  <a href='profile.php?my_order'><input type='submit' name='order_details' class='btn btn-dark mb-2 px-5 border border-white'
        value='Order Details'></a> </center>";
          }
          else
          {
            echo "<h2 class='rounded text-center border border-dark bg-white text-dark'>
                You Have Zero Pending Orders
            </h2>
            <br>
          <center>  <a href='index.php'><input type='submit' name='explore_product' class='btn btn-dark mb-2 px-5 border border-white'
        value='Explore Product'></a> </center>";
          }
        }
      }
  }
}
}




















//Get Ip_Address Function Start

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  }  
  // $ip = getIPAddress();  
  // echo 'User Real IP Address - '.$ip; 
  
  //Get Ip_Address Function End
  
?>