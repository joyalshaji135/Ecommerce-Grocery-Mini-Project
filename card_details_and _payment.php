<?php

include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();

include('./Layouts/header2.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./Admin Panel/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css" />
    <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css" />
</head>
<script>
  function validate(){
	var today, someday;
var exMonth=document.getElementById("exMonth").value;
var exYear=document.getElementById("exYear").value;
var cvv=document.getElementById("cvv").value;
var name=document.getElementById("nameu").value;
var regEx = 5555555555555555;
var credit=document.getElementById("credit").value;
today = new Date();
someday = new Date();
someday.setFullYear(exYear, exMonth);
if(regEx!=credit){
			document.getElementById('pass').innerHTML="Invaid Credit Card";
			return false;
		 }

if (someday < today) {
  document.getElementById('date').innerHTML="Expired Card";
   return false;
    }
    if(cvv.length!=3){
			document.getElementById('cvvno').innerHTML="Invalid cvv";
			return false;
			}
      if(isNaN(cvv)){
			document.getElementById('cvvno').innerHTML="Invalid cvv";
			return false;
  }
  if(!isNaN(name)){
			document.getElementById('name').innerHTML="Invalid Name";
			return false;
		 }
     else
     {
      document.getElementById('main').innerHTML="Validation Successfully";
     }
}
    </script>
<body>
	

    <?php

   $username=$_SESSION['username'];
   $select_user_tbl="select * from user_registration where username='$username'";
   $select_result=mysqli_query($con,$select_user_tbl);
   $row=mysqli_fetch_array($select_result);
   $user_id=$row['user_id'];

   $amount_due=0;  
   $select_query="Select * from add_to_cart_tbl";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_array($result_query))
  {
   $product_id=$row['product_id'];
   $quantity=$row['quantity'];
   $select_product="Select * from product_tbl where product_id=$product_id";
   $result_product=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($result_product)){
        $price_table=$row_product_price['product_current_price'];
        $amount_due+=$quantity*$price_table;
        }
      }

	if(isset($_GET['order_id']))
	{
		$order_id=$_GET['order_id'];
		$select_order="select * from user_order_tbl where user_id=$user_id";
		$result_order=mysqli_query($con,$select_order);
		$row_order=mysqli_fetch_array($result_order);
    $invoice_number=$row_order['invoice_number'];
    
	}
	
      if(isset($_POST['payment_submit']))
      {
        $invoice=$_POST['invoice_number'];
        $card_number=$_POST['creditCradNum'];
        $hash_card_number=password_hash($card_number,PASSWORD_DEFAULT);
        $month=$_POST['month'];
        $year=$_POST['year'];
        $cvv=$_POST['cvv_no'];
        $hash_cvv=password_hash($cvv,PASSWORD_DEFAULT);
        $holder_name=$_POST['card_holder_name'];       // payment_id	order_id	invoice_number	amount	card_number
        	                                              //expiry_month	cvv_number	expiry_year	holder_name	date	
       
        $insert_payment_details="insert into payment_tbl (order_id,invoice_number,amount,card_number,expiry_month,cvv_number,expiry_year,
        holder_name,date) values ($order_id,$invoice_number,$amount_due,'$hash_card_number',$month,
        '$hash_cvv',$year,'$holder_name',NOW())";
        
        $result_insertion=mysqli_query($con,$insert_payment_details);
        if($result_insertion)
        {
          echo "<script>alert('Payment Successfully')</script>";
          $empty_cart="Delete from add_to_cart_tbl";
          $empty_cart_result=mysqli_query($con,$empty_cart);
          echo "<script>window.open('./profile.php?my_','_self')</script>";
        }
        
        $order_update="update user_order_tbl set order_status='Completed' where user_id=$user_id";
        $result_order_status=mysqli_query($con,$order_update);
      }
        
  
		
    ?>
<nav class="navbar navbar-default">
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Payment Gate</li>
			</ol>
		</div>
	</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Payment Gate</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<a href="profile.php?my_order" class="btn btn-success">Back</a>
		<br />

		<div class="row">
                            <div class="col-md-6">
                                <b><h4 class="text-dark">CREDIT/DEBIT CARD PAYMENT</h4></b>
                                
                            </div>

                            <div class="col-md-6 text-right" style="margin-top: -5px;">

                                  <img src="https://img.icons8.com/color/36/000000/visa.png">
                                  <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                                  <img src="https://img.icons8.com/color/36/000000/amex.png">
                                           
                            </div>      

                        </div>
			<form name="form1" method="post" onsubmit="return validate()">
      <div class="form-group">
      <center><b><h3><span id="main" class="text-success "></span></h3></b></center>
        <br>
        <br>
              <label>Invoice Number</label>
                <input class="input-lg form-control" autocomplete="#" 
                type="tel" value="#<?php echo $invoice_number ?>" placeholder="" name="invoice_number" readonly="readonly"/>
              <div class="form-group">
              </div>

              <label>Card Number</label>
                <input class="input-lg form-control cc-number" autocomplete="cc-number" 
                type="tel" value="" maxlength="16" placeholder="xxxx xxxx xxxx xxxx" id="credit"
                name="creditCradNum" required="required"/>
				<b><span id="pass" class="text-danger "></span></b>
				<br>
               </div>
                <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                <label>Month</label>
 <select class="input-lg form-control" name="month" id="exMonth" title="select a month">
 <option value="0">Enter month</option>
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<b><span id="date" class="text-danger text-center"></span></b>
               </div>
            </div>
			<div class="col-md-3">
                <div class="form-group">
              <label>Year</label>
<select class="input-lg form-control" name="year" id="exYear" title="select a year">
<option value="0">Enter year</option>
    <option value="2013">13</option>
    <option value="2014">14</option>
    <option value="2015">15</option>
    <option value="2016">16</option>
    <option value="2017">17</option>
    <option value="2018">18</option>
    <option value="2019">19</option>
    <option value="2020">20</option>
    <option value="2021">21</option>
    <option value="2022">22</option>
    <option value="2023">23</option>
    <option value="2024">24</option>
    <option value="2025">25</option>
    <option value="2026">26</option>
    <option value="2027">27</option>
    <option value="2028">28</option>
    <option value="2029">29</option>
    <option value="2030">30</option>
    <option value="2031">31</option>
</select>
               </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
              <label>CVV</label>
              <input class="input-lg form-control cc-cvc" id="cvv"
			  autocomplete="off" type="text" maxlength="3" value="" placeholder="xxx" id="cvv" name="cvv_no" required="required"/>
			  <b><span id="cvvno" class="text-danger "></span></b>
               </div>
            </div>
                </div>
                <div class="form-group">
              <label>Card Name</label>
                <input class="input-lg form-control" type="text" value="" name="card_holder_name" id="nameu" required="required"/>
                <b><span id="name" class="text-danger"></span></b>
                </div>
                <div class="form-group">
                    <br>
					<b><span id="success" class="text-success "></span></b>
               <b>
			   
         <input class="form-control btn btn-success mb-2 px-4 border border-dark" type="submit" name="payment_submit" 
         value="PAYMENT" id="total"/>

			   
</div>
                </form>
              		</div>
	</div>
</div>

    <script src="./Admin Panel/js/jquery-3.2.1.min.js"></script>
<script src="./Admin Panel/js/bootstrap.js"></script>




<?php
 $empty_order="Delete from user_order_pending_tbl where user_id=$user_id";
 $empty_order_result=mysqli_query($con,$empty_order);
 /*  */
?>
</body>
</html>

