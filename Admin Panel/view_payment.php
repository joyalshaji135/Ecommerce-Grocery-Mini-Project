
<?php

include('../Connection/db_connection.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- logo -->
		<link rel="icon" href="../images/ace_logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .logo{
    width: 6%;
    height: 6%;
}
.agile-login ul a {
    font-size: bold;
    text-transform: capitalize;
    color: black;
    text-decoration: none;
}
body
{
    overflow-x:hidden;
}
</style>
<body class="bg-white">
<div class="container-fluid p-0">
  <!--First Child Start-->
            <nav class="navbar nav-expand-lg bg-primary">
                      
                          <img src="../images/ace_logo.png" alt=""class="logo">
                                <div class="agile-login">
                                  <div class="text-center  p-2">
                                    <ul>
                                    <?php
          
					if(!isset($_SESSION['admin_name']))
					{
						echo "<b><a href='#' class='text-white'></a></b>";
					}else
					{
            $admin_name=$_SESSION['admin_name'];
						echo "<b><a href='#' class='text-white'>Welcome $admin_name</a></b>";
					}
					?>
          <br>
         
          <?php
					if(!isset($_SESSION['admin_name']))
					{
						echo "<b><a href='./admin_login.php' class='text-white btn btn-dark'>Login</a></b>";
					}else
					{
						echo "<b><a href='../index.php' class='text-white btn btn-dark'>Logout</a></b>";
					}
					?>
                                    </ul>
                                  </div>
                                </div>
                      
            </nav>
        <!--First Child End-->
<!--Second Child Start-->
                            <div class="bg-white">
                                        <h3 class="text-center p-2">
                                          Manage Detials
                                        </h3>
                            </div>
<!-- Second Child End  -->
<!-- Navbar Start -->
              <nav class="navbar navbar-expand-lg bg-primary">
  
    <a class="navbar-brand text-white" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home Page</a>
</li>
</ul>
</div>

</nav>

    <br>

       <h2 class="text-center text-dark mb-3">View All Payment Details</h2>
       <hr>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
<table class="table table-bordered mt-3">
    <thead class="bg-dark text-white">
<?php

      $select_payment_query="select * from payment_tbl";
      $result_query=mysqli_query($con,$select_payment_query);
      $count_query=mysqli_num_rows($result_query);
     if($count_query==0)
     {
        echo "<h3 class='text-center text-danger mt-5'>Not Yet Payments</h3>";
     }
     else
     {
        echo "<tr>
        <th class='text-center'>Sl no</th>
        <th class='text-center'>Invoice Number</th>
        <th class='text-center'>Amount</th>
        <th class='text-center'>Holder Name</th>
        <th class='text-center'>Payment Method</th>
        <th class='text-center'>Payment Date</th>
        <th class='text-center'>Delete</th>
    </tr>
  </thead>
  <tbody class='bg-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result_query))
        {
          $payment_id=$row_data['payment_id'];
          $amount=$row_data['amount'];
          $invoice_number=$row_data['invoice_number'];
          $holder_name=$row_data['holder_name'];
          $payment_date=$row_data['date'];
          $number++;

          echo "<tr>
          <th class='text-center'>$number</th>
          <th class='text-center'>$invoice_number</th>
          <th class='text-center'>$amount</th>
          <th class='text-center'>$holder_name</th>
          <th class='text-center'>Bank Transfer</th>
          <th class='text-center'>$payment_date</th>
          <th class='text-center'><a href='delete_payment.php?delete_payment_id=$payment_id'
          class='btn btn-primary text-dark' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></th>
      </tr>";
        }
     }

?>
        
        
    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Are you Sure You want to Delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./view_order.php" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary">
          <a href='delete_payment.php?delete_payment_id=<?php echo $payment_id?>' 
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>


</div>
<div class="col-md-2"></div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<div class="bg-primary p-3 text-center">
<p>All right Reserved @-Designed By Joyal Shaji</p>
</div>
</div> 
</body>
</html>