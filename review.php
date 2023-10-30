<!-- review Page -->

<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');

session_start();
include('./Layouts/header2.php');

?>

<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Review Page</li>
			</ol>
		</div>
	</div>
    <br>
    <br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-white">
<h1 class="text-center text-primary">REVIEW PAGE</h1>
    <form action="" method="post">
    <div class="row">
        <div class="col-md-2">

        </div>
    <div class="col-md-6">
    <div class="form-group">
   <h4><label for="exampleFormControlTextarea1" class="text-dark text-bold">Write the Product Review</label></h4>
    <textarea class="form-control bg-light" id="exampleFormControlTextarea1" name="review_code" rows="8"></textarea>
  </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
        <br>
        <input type="submit" class="form-control input-lg bg-primary text-white" value="POST" name="review">
</div>
<div class="col-md-1">

</div>
    </div>
    </div>
    </form>
    
    <?php

        $username=$_SESSION['username'];
        $select_user_query="select * from user_registration where username='$username'";
        $result_user_query=mysqli_query($con,$select_user_query);
        $row_fetch_user=mysqli_fetch_assoc($result_user_query);
        $user_id=$row_fetch_user['user_id'];
        
        if(isset($_GET['order_id']))
        {

        $user_order_id=$_GET['order_id'];

        $select_product_query="select * from user_order_tbl where order_id=$user_order_id";
        $result_product_query=mysqli_query($con,$select_product_query);
        $row_fetch_product=mysqli_fetch_assoc($result_product_query);
        $product_id=$row_fetch_product['product_id'];
        


        if(isset($_POST['review']))
        {
            $review_code=$_POST['review_code']; 
            $insert_review="insert into review_tbl (product_id,user_id,product_review,date) values 
            ('$product_id','$user_id','$review_code',NOW())";
            $result_review=mysqli_query($con,$insert_review);
            if($result_review)
            {
                echo "<script>alert('Review is Posted Successfully')</script>";
                echo "<script>window.open('./single_product_page.php?product_id=$product_id','_self')</script>";
            }
            
        }
    }

    ?>
</div>   
</body>
</html>



<?php
include('./Layouts/footer.php');
?>