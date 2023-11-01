<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();

?>
<?php
include('./Layouts/header2.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- logo -->
  <link rel="icon" href="./images/ace_logo.png" />
  <title>Order Details</title>
  <!-- BOOTSTRAP FILE INCLUDING -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<style>
  body {
    background: #eee;
  }

  .card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: lavender;
    ;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: 1rem;
  }

  .text-reset {
    --bs-text-opacity: 1;
    color: inherit !important;
  }

  a {
    color: #5465ff;
    text-decoration: none;
  }

  .logo {
    height: 25%;
    width: 25%;
  }
</style>

<body class="bg-white">
  <!-- breadcrumbs -->
  <nav class="navbar nav-expand-lg bg-light">
    <div class="container-fluid">

  </nav>
  <!-- //breadcrumbs -->
  <div class="container-fluid">
    <?php

    $get_details = "select * from user_order_pending_tbl";
    $result_details = mysqli_query($con, $get_details);
    $row = mysqli_fetch_array($result_details);
    $invoice = $row['invoice_number'];

    ?>
    <div class="container">
      <!-- Title -->
      <div class="d-flex justify-content-between align-items-center py-3">
        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #<?php echo $invoice ?></h2>
      </div>

      <!-- Main content -->
      <div class="row">
        <div class="col-lg-8">
          <!-- Details -->
          <div class="card mb-5">
            <div class="card-body">
              <div class="mb-3 d-flex justify-content-between">
                <div>

                  <span class="me-3"></span>
                  <span class="me-3">#<?php echo $invoice ?> </span>
                  <span class="badge rounded-pill bg-warning">ACE MART</span>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
                  <div class="dropdown">
                    <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <table class="table table-borderless">
                <tbody>


                  <!--  <tr>
                <td>
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0">
                      <img src="./Admin Panel/Product_Image/12.png" alt="" width="50" class="img-fluid">
                    </div>
                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="./single_product_page.php" class="text-reset">
                      Product Name : Product Description</a></h6>
                       <span class="small">Offer:10%</span> 
                    </div>
                  </div>
                </td>
                <td>3</td>
                <td class="text-end">1000</td>
              </tr> -->
                  <?php

                  $username = $_SESSION['username'];
                  $get_user_query = "select * from user_registration where username='$username'";
                  $result_user_query = mysqli_query($con, $get_user_query);
                  $row_fetch = mysqli_fetch_assoc($result_user_query);
                  $user_id = $row_fetch['user_id'];
                  $username = $row_fetch['username'];
                  $user_address = $row_fetch['user_address'];
                  $user_email = $row_fetch['user_email'];
                  $total = 0;
                  $user_phone_number = $row_fetch['user_phone_number'];
                  $get_order_details = "select * from user_order_pending_tbl where user_id=$user_id";
                  $result_order_details = mysqli_query($con, $get_order_details);
                  while ($row_order = mysqli_fetch_assoc($result_order_details)) {
                    $order_id = $row_order['order_id'];
                    $product_id = $row_order['product_id'];
                    $order_invoice_number = $row_order['invoice_number'];
                    $order_amounts = $row_order['amount_due'];
                    $order_quantity = $row_order['product_quantity'];

                    $get_product_details = "select * from product_tbl where product_id=$product_id";
                    $result_product_details = mysqli_query($con, $get_product_details);
                    while ($row_product = mysqli_fetch_assoc($result_product_details)) {
                      $product_name = $row_product['product_name'];
                      $product_image = $row_product['product_image'];
                      $product_offer = $row_product['product_offer'];
                      $product_description = $row_product['product_description'];
                      $product_actual_price = $row_product['product_actual_price'];
                      $product_current_price = $row_product['product_current_price'];
                      $total += $order_quantity * $product_current_price;

                  ?>


                      <tr>
                        <td>
                          <div class="d-flex mb-2">
                            <div class="flex-shrink-0">
                              <img src="./Admin Panel/Product_Image/<?php echo $product_image ?>" alt="" width="50" class="img-fluid">
                            </div>
                            <div class="flex-lg-grow-1 ms-3">
                              <h6 class="small mb-0"><a href="./single_product_page.php" class="text-reset">
                                  <?php echo $product_name ?>: <?php echo $product_description ?></a></h6>
                              <span class="small text-success">Offer:<?php echo $product_offer ?>%</span>
                            </div>
                          </div>
                        </td>
                        <td><b><?php echo $order_quantity ?></b> X <b><?php echo $product_current_price ?>/-</b></td>
                        <td class="text-end"><b><?php echo $order_amounts ?>/-</b></td>
                      </tr>





                  <?php

                    }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">TOTAL</td>
                    <td class="text-end"><?php echo $total ?>/-</td>
                  </tr>
                  <tr class="fw-bold">
                    <td colspan="2">GRAND TOTAL</td>
                    <td class="text-end"><?php echo $total ?>/-</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- Payment -->
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="h6">ACE MART</h3>
                  <strong>FedEx</strong>
                  <span><a href="#" class="text-decoration-underline" target="_blank">FF<?php echo $order_invoice_number ?></a> <i class="bi bi-box-arrow-up-right"></i> </span>
                  <hr>
                  <h3 class="h6">Address</h3>
                  <address>
                    <strong><?php echo $username ?></strong><br>
                    <?php echo $user_address ?><br>
                    <?php echo $user_email ?><br>
                    <abbr title="Phone">Phone Number</abbr> <?php echo $user_phone_number ?>
                  </address>
                </div>

                <div class="col-lg-6">
                  <div class="form-outline mb-4 w-50 m-auto">
                    <a href="./card_details_and _payment.php?order_id=<?php echo $order_id ?>"><input type="submit" class="btn btn-primary rounded" value="Continue to Pay"></a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
    </div>
  </div>
  <?php
  include('./Layouts/footer.php');
  ?>
</body>

</html>