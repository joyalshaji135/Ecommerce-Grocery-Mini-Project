<?php
include('./Connection/db_connection.php');
session_start();
?>



<?php
if(!isset($_SESSION['username']))
{
    include('login.php');
}
else
{

    
    include('check.php');
}

?>


