<?php

        if(isset($_GET['edit_account']))
        {
            $user_session_name=$_SESSION['username'];
            $select_user_query="select * from user_registration where username='$user_session_name'";
            $result_user_query=mysqli_query($con,$select_user_query);
            $row_fetch_array=mysqli_fetch_assoc($result_user_query);
            $user_id=$row_fetch_array['user_id'];
            $username=$row_fetch_array['username'];
            $user_email=$row_fetch_array['user_email'];
            $user_address=$row_fetch_array['user_address'];
            $user_phone_number=$row_fetch_array['user_phone_number'];
        }

        if(isset($_POST['update_value']))
        {
            $update_id=$user_id;
            $username=$_POST['username'];
            $user_email=$_POST['user_email'];
            $user_address=$_POST['user_address'];
            $user_phone_number=$_POST['user_phone_number'];
            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];

            move_uploaded_file($user_image_tmp,"./users_image_folder/$user_image");

            //Update Query for user_registration_tbl
            $update_data_query="update user_registration set user_email='$user_email',user_address='$user_address'
            ,user_phone_number='$user_phone_number',user_image='$user_image',username='$username' where user_id='$update_id'";
            $result_update_query=mysqli_query($con,$update_data_query);
            if($result_update_query)
            {
               echo "<script>alert('Profile Updated Successfully')</script>";
               echo "<script>window.open('./profile.php','_self')</script>";
        }
        }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<style>
.userimage {
    width: 100px;
    height: 100px;
}
</style>
<body>
<h2 class='rounded text-center border border-dark bg-white text-dark'>
                Edit Account
            </h2>
<br>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_email_id" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                <label for="file" class="form-label">Image</label>
                    <input type="file" class="form-control" name="user_image">
                    <img src="./users_image_folder/<?php echo $user_image; ?>" alt="" srcset="" class="userimage">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                <label for="address" class="form-label">Address</label>
                    <input type="address" class="form-control" value="<?php echo $user_address; ?>" name="user_address">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" value="<?php echo $user_phone_number; ?>" 
                    name="user_phone_number">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                <center><input type="submit" name="update_value" class="btn btn-dark mb-2 px-4 border border-white" 
                value="Save"></center>
                </div>
            </form>
</body>
</html>