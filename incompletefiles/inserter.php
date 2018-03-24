<?php

require 'db.php';
$con=mysqli_connect($server,$db_username,$db_password,$db_name);
if(mysqli_error($con))
{
            echo 'An error occured. Please try again. '. mysqli_error($con);
            exit();
}
for($i=1;$i<53;$i++)
{
    $sql="INSERT INTO ROOMS VALUES(".$i.", 0);";
    $res=mysqli_query($con,$sql);
    if(!$res)
    {
        echo 'error i='.$i;
        exit();
    }
}
echo 'successful';
?>