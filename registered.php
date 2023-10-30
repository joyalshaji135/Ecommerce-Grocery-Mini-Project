<!-- including connection -->
<?php

include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>
<!-- including header file -->
<?php
include('./Layouts/header.php');
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">

					<!-- Username Declaration -->
				<input type="text" id="username" class="form-control"
             placeholder="Enter Your Username" autocomplete="off" 
			name="username">
			<b><small><span id="user" class="text-danger"></span></small></b>
			<br>

					<!-- Email Declaration -->
			<input type="email" id="user_email" class="form-control"
             placeholder="Enter Your Email" autocomplete="off"  
			name="user_email">
			<b><small><span id="email" class="text-danger "></span></small></b>
			<br>

					<!-- Phone NumberDeclaration -->
			<input type="text" id="mobileno" class="form-control"
             placeholder="Enter Your Contact" maxlength="10" autocomplete="off" 
			name="user_phone_number">
			<b><small><span id="phone" class="text-danger "></span></small></b>
			<br>

					<!-- Address Declaration -->
					<textarea class="form-control bg-light" id="adrress_feild" 
					name="user_address" placeholder="Enter Your Address" rows="4"></textarea>
			        <b><small><span id="address" class="text-danger "></span></small></b>

						<!-- Password Declaration -->
			<input type="password" id="user_password" class="form-control"
             placeholder="Enter Your Password" autocomplete="off" 
			name="user_password">
			<b><small><span id="pass" class="text-danger "></span></small></b>

					<!-- Confirm Password Declaration -->
			<input type="password" id="confirm_user_password" class="form-control"
             placeholder="Enter Your Confirm Password" autocomplete="off"  
			name="confirm_user_password">
			<b><small><span id="conf_pass" class="text-danger "></span><br></small></b>

					<!-- Image Declaration -->
			<input type="file" id="user_image" class="form-control"
              name="user_images" require="required">
					
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" require="required"><i> </i>
								I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" id="submit" value="Register" name="user_register" autocomplete="off">
				</form>
			</div>
			<div class="register-home">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function validate()
	{
		var username = document.getElementById('username').value;
		var user_email = document.getElementById('user_email').value;
		var user_number = document.getElementById('mobileno').value;
		var user_pass = document.getElementById('user_password').value;
		var user_address = document.getElementById('adrress_feild').value; 
		var user_conf_pass = document.getElementById('confirm_user_password').value;
		if(username == ""){
			document.getElementById('user').innerHTML="**Please Fill the Username Field";
			return false;
		}
         if((username.length <= 2) || (username.length >10)){
			document.getElementById('user').innerHTML="**Username Length Must be between 2 and 10";
			return false;
		 }
		 if(!isNaN(username)){
			document.getElementById('user').innerHTML="**Only Characters are Allowed";
			return false;
		 }






		if(user_email == ""){
			document.getElementById('email').innerHTML="** Please Fill the Email Field ";
			return false;
			}

			if(user_email.indexOf('@') <= 0){
			document.getElementById('email').innerHTML="** @ Invalid Position";
			return false;
			}

			if((user_email.charAt(user_email.length-4)!='.') && (user_email.charAt(user_email.length-3)!='.')){
			document.getElementById('email').innerHTML="** . Invalid Position";
			return false;
			}
			
		if(user_number == ""){
			document.getElementById('phone').innerHTML="** Please Fill the Phone Number Field";
			return false;
			}

			if(isNaN(user_number)){
			document.getElementById('phone').innerHTML="** Characters are not Allowed";
			return false;
			}
			if(user_number.length!=10){
			document.getElementById('phone').innerHTML="** Mobile Number Must be 10 Digit Only";
			return false;
			}
			
			if(user_address == ""){
			document.getElementById('address').innerHTML="** Please Fill the Address Field";
			return false;
			}

		if(user_pass == ""){
			document.getElementById('pass').innerHTML="** Please Fill the Password Field";
			return false;
			}
		if((user_pass.length <= 5) || (user_pass.length >20)){
			document.getElementById('pass').innerHTML="** Password Length Must be between 2 and 10";
			return false;
		 }

		 if(user_pass!=user_conf_pass){
			document.getElementById('pass').innerHTML="** Password are not Matching";
			return false;
		 }



		if(user_conf_pass == ""){
			document.getElementById('conf_pass').innerHTML="** Please Fill the Confirm Password Field";
			return false;
			}
	}

</script>
<!-- //register -->
<!-- Footer File Including -->	
<?php
include('./Layouts/footer.php')
?>


<!-- Connecting data base in registeration -->

<?php

          if(isset($_POST['user_register']))
             {
                    $username=$_POST['username'];
                    $user_email=$_POST['user_email'];
                    $user_password=$_POST['user_password'];
					$hash_password=password_hash($user_password,PASSWORD_DEFAULT);
                    $confirm_user_password=$_POST['confirm_user_password'];
                    $user_address=$_POST['user_address'];
                    $user_phone_number=$_POST['user_phone_number'];
                    $user_image=$_FILES['user_images']['name'];
                    $user_tmp_image=$_FILES['user_images']['tmp_name'];
                    $user_ip_address=getIPAddress();
					//Select Query
					$select_query="Select * from `user_registration` where 
                    username='$username' or user_email='$user_email' or user_phone_number='$user_phone_number'";
                    $result_query=mysqli_query($con,$select_query);
                    $num_row=mysqli_num_rows($result_query);
					/* 
					{
						echo " not";
					} */
                    if($num_row>0)
                    {
                        echo "<script>alert('Username,Email and Phone Number are already exist')</script>";
                    }
                    else if($user_password!=$confirm_user_password)
                    {
                        echo "<script>alert('Password Don not Matching')</script>";
                    }
                    else if(preg_match("/^([0-9]{10})$/",$user_phone_number))
					{
						move_uploaded_file($user_tmp_image,"./users_image_folder/$user_image");
                    $insert_query="insert into `user_registration` 
                    (username,user_email,user_password,user_image,user_ip_address,user_address,user_phone_number) 
                    values ('$username','$user_email','$hash_password','$user_image','$user_ip_address','$user_address','$user_phone_number')";
                    $sql_execute=mysqli_query($con,$insert_query);
					$insert_login_query="insert into `user_login_tbl` 
                    (username,password) values ('$username','$hash_password')";
                    $sql_login_execute=mysqli_query($con,$insert_login_query);
					if($sql_execute)
					{
						echo "<script>alert('Registeration SucessFully')</script>";
						echo "<script>window.open('login.php','_self')</script>";
					}
						
					}
					else
                    {
                    //insert query
                    echo "<script>alert('Invalid Number')</script>";
					
                    }
                     
					//Select cart Items
					$select_cart_items="select * from add_to_cart_tbl where ip_address='$user_ip_address'";
					$result_cart=mysqli_query($con,$select_cart_items);
					$row_count=mysqli_num_rows($result_cart);
					if($row_count>0)
					{
						$_SESSION['username']=$username;
						echo "<script>alert('You Have Items In Your Cart')</script>";
						echo "<script>window.open('checkout.php','_self')</script>";
					}
					else
					{
						echo "<script>window.open('index.php','_self')</script>";
					}
}

?>