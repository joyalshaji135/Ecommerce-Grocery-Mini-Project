<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <h2 class='rounded text-center border border-dark bg-white text-dark'>
        Delete Account
    </h2>

    <form action="" method="post" class="mt-5">
        <div class="form-outline md-4">
            <input type="submit" class="form-control w-50 m-auto bg-danger" name="delete_account" value="Delete Account">
        </div>
        <br>
        <div class="form-outline md-4">
            <input type="submit" class="form-control w-50 m-auto bg-success" name="no_delete_account" value="Don't Delete Account">
        </div>
    </form>

    <?php
    $username_session = $_SESSION['username'];
    if (isset($_POST['delete_account'])) {
        $delete_query = "delete from user_registration where username='$username_session'";
        $result_delete_query = mysqli_query($con, $delete_query);
        if ($result_delete_query) {
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    if (isset($_POST['no_delete_account'])) {

        echo "<script>window.open('profile.php','_self')</script>";
    }

    ?>
</body>

</html>̥