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
    <title>Document</title>
    <!-- BOOTSTRAP FILE INCLUDING -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        body {
            background: #98AFC7
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        body {
            background-color: #fbfbfb;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }
    </style>
</head>

<body>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <?php
                $username = $_SESSION['username'];

                echo "<li class'active'>Welcome $username</li>"; ?>
            </ol>
        </div>
    </div>

    <div class="container-fluid mt-6 mb-6 rounded bg-white">
        <div class="container rounded bg-light mt-5 mb-5 ">
            <div class="row">
                <div class="col-md-2 border-right p-0">

                    <div class="rounded d-flex flex-column align-items-center text-center p-3 py-5 bg-primary">

                        <div class="d-flex rounded text-center mb-3 border border-white">
                            <b>
                                <h4 class="text-center">𝐏𝐫𝐨𝐟𝐢𝐞 𝐒𝐞𝐭𝐭𝐢𝐧𝐠𝐬</h4>
                            </b>
                        </div>
                        <!-- User Image Fetching and Username Fetching -->
                        <?php
                        $username = $_SESSION['username'];
                        $select_query = "select * from user_registration where username='$username'";
                        $result_query = mysqli_query($con, $select_query);
                        $row_image = mysqli_fetch_array($result_query);
                        $user_image = $row_image['user_image'];
                        $user_email = $row_image['user_email'];
                        echo "<img class='rounded-circle' width='130' src='./users_image_folder/$user_image'>";
                        echo "<b><span class='font-weight-bold'>$username</span></b>";
                        echo "<b><span class='text-white'>$user_email</span></b>";
                        ?>

                        <span> </span>
                        <br>
                        <br>
                        <div class="d-flex text-center mb-3">
                            <a href="profile.php"><input type="submit" name="#" class="btn btn-white mb-2 px-4 border border-white" value="Pending Order"></a>
                        </div>
                        <div class="d-flex text-center mb-3">
                            <a href="profile.php?edit_account"><input type="submit" name="#" class="btn btn-white mb-2 px-4 border border-white" value="Edit My Account"></a>
                        </div>
                        <div class="d-flex text-center mb-3">
                            <a href="profile.php?my_order"><input type="submit" name="#" class="btn btn-white mb-2 px-4 border border-white" value="My Order Details"></a>
                        </div>
                        <div class="d-flex text-center mb-3">
                            <a href="profile.php?delete_account"><input type="submit" name="#" class="btn btn-white mb-2 px-4 border border-white" value="Delete Account"></a>
                        </div>
                        <div class="d-flex text-center mb-3">
                            <a href="logout.php"><input type="submit" name="#" class="btn btn-white mb-2 px-4 border border-white" value="Account Logout"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 border-right bg-light">
                    <div class="mt-2 mb-2 ">
                        <h2 class=" rounded text-center border border-primary bg-dark text-white">𝐖𝐞𝐥𝐜𝐨𝐦𝐞 𝐭𝐨 𝐀𝐂𝐄 𝐌𝐚𝐫𝐭</h2>
                    </div>
                    <br>
                    <br>
                    <div class="mt-5 mb-2">
                        <?php

                        get_user_order_details();

                        if (isset($_GET['edit_account'])) {
                            include('edit_account.php');
                        }
                        if (isset($_GET['my_order'])) {
                            include('my_order.php');
                        }
                        if (isset($_GET['delete_account'])) {
                            include('delete_account.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- BOOTSTRAP JS FILE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>

<?php
include('./Layouts/footer.php');
?>