<?php
    include "../Connection/db_connection.php";
    $select_sub_category="select * from sub_category_tbl where 
    category_id='".$_POST['category_ID']."'order by sub_category_name";
    $result_sub_category=mysqli_query($con,$select_sub_category);
    echo "<option value='' disabled selected>-Select Sub Category-</option>";
        while($row_fetch=mysqli_fetch_assoc($result_sub_category))
        {
            $sub_category_id=$row_fetch['sub_category_id'];
            $sub_category_name=$row_fetch['sub_category_name'];
            echo "<option value='$sub_category_id'>$sub_category_name</option>";
        }
        

?>