<?php
include('./Connection/db_connection.php');
include('./Functions/common_function.php');
session_start();
?>





<?php
include('./Layouts/header.php');
?>
<!-- including Nav bar  -->
<!-- navigation -->
<?php

include('./Layouts/navbar.php');

?>

<!-- //navigation -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        #testimonials {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .testimonial-heading {
            letter-spacing: 1px;
            margin: 30px 0px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .testimonial-heading span {
            font-size: 1.3rem;
            color: #252525;
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .testimonial-box-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .testimonial-box {
            width: 500px;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 20px;
            margin: 15px;
            cursor: pointer;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .name-user {
            display: flex;
            flex-direction: column;
        }

        .name-user strong {
            color: #3d3d3d;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .name-user span {
            color: #979797;
            font-size: 0.8rem;
        }

        .reviews {
            color: #f9d71c;
        }

        .box-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .client-comment p {
            font-size: 0.9rem;
            color: #4b4b4b;
        }

        .testimonial-box:hover {
            transform: translateY(-10px);
            transition: all ease 0.3s;
        }

        @media(max-width:1060px) {
            .testimonial-box {
                width: 45%;
                padding: 10px;
            }
        }

        @media(max-width:790px) {
            .testimonial-box {
                width: 100%;
            }

            .testimonial-heading h1 {
                font-size: 1.4rem;
            }
        }

        @media(max-width:340px) {
            .box-top {
                flex-wrap: wrap;
                margin-bottom: 10px;
            }

            .reviews {
                margin-top: 10px;
            }
        }

        ::selection {
            color: #ffffff;
            background-color: #252525;
        }
    </style>
</head>

<body>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Singlepage</li>
            </ol>
        </div>
    </div>

    <!-- Product Detials -->

    <?php

    view_more();

    ?>







    <section id='testimonials'>

        <div class='testimonial-heading'>
            <span>Comments</span>
            <h4>Clients Says</h4>
        </div>

        <div class="testimonial-box-container">


            <?php
            if (isset($_GET['product_id'])) {
                $product = $_GET['product_id'];

                $select_review_query = "select * from review_tbl where product_id=$product";
                $result_review_query = mysqli_query($con, $select_review_query);
                while ($row_review = mysqli_fetch_assoc($result_review_query)) {
                    $product_id = $row_review['product_id'];
                    $user_id = $row_review['user_id'];
                    $product_review = $row_review['product_review'];

                    $select_user_query = "select * from user_registration where user_id=$user_id";
                    $result_user_query = mysqli_query($con, $select_user_query);
                    while ($row_user = mysqli_fetch_assoc($result_user_query)) {
                        $username = $row_user['username'];
                        $user_email = $row_user['user_email'];
                        $user_image = $row_user['user_image'];
                        echo "<div class='testimonial-box'>
                <div class='box-top'>
                    
                <div class='profile'>
                    
                    <div class='profile-img'>
                        <img src='./users_image_folder/$user_image'> 
                    </div>
                    
                    <div class='name-user'>
                        <strong>$username</strong> 
                        <span>$user_email</span>
                    </div>
                </div>
               
            </div>
            
            <div class='client-comment'>
                <p>$product_review</p> 
            </div>
            </div>";
                    }
                }
            }


            ?>



        </div>
    </section>

    <!-- new -->
    <div class="newproducts-w3agile">
        <div class="container">
            <h3>Similer Products</h3>
            <?php

            if (isset($_GET['product_id'])) {
                $product = $_GET['product_id'];
                $select_product_sub_id = "select * from product_tbl where product_id=$product";
                $result_sub_id = mysqli_query($con, $select_product_sub_id);
                $row_fetch = mysqli_fetch_array($result_sub_id);
                $sub_category_id = $row_fetch['sub_category_id'];


                $select_product_query = "select * from product_tbl where sub_category_id=$sub_category_id";
                $result_product_query = mysqli_query($con, $select_product_query);

                while ($product_row = mysqli_fetch_array($result_product_query)) {
                    $product_id = $product_row['product_id'];
                    $product_name = $product_row['product_name'];
                    $product_image = $product_row['product_image'];
                    $product_actual_price = $product_row['product_actual_price'];
                    $product_current_price = $product_row['product_current_price'];
                    $product_offer = $product_row['product_offer'];
                    $category_id = $product_row['category_id'];
                    $sub_category_id = $product_row['sub_category_id'];
                    echo "<div class='agile_top_brands_grids'>
                    <div class='col-md-3 top_brand_left-1'>
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


            ?>
        </div>
    </div>
    <!-- //new -->

    </div>
</body>

</html>

<?php
include('./Layouts/footer.php');
?>