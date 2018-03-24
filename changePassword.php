<?php
    require 'db.php';
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        session_start();
        if((!isset($_SESSION['user']))||$_SESSION["user"]=="")
        {
            echo 'An error occured. Please try again.';
            exit();
        }
        $username=$_SESSION["user"];
        $con=mysqli_connect($server,$db_username,$db_password,$db_name);
        if(mysqli_error($con))
        {
            echo 'An error occured. Please try again.';
            exit();
        }
        $pwd=$_POST['password'];
        $sql="UPDATE login set password='".md5($pwd)."';";
        if(!mysqli_query($con, $sql))
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
        exit();
    }
