<!-- including connection -->

<?php

$con = mysqli_connect('localhost', 'root', '', 'store');
if (!$con) {
    die(mysqli_error($con));
}



?>