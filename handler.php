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
        $rmate=$_POST['rmate'];
        $sql="SELECT * FROM roommate where username='".$username."';";
        $result=mysqli_query($con,$sql);
        if(!$result)
        {
            echo 'An error occured. Please try again.';
            exit();
        }
        $result= mysqli_fetch_assoc($result);
        if($result['partner']!="")
        {
            echo 'You have already been alloted a room with '.$result['partner'];
            exit();
        }
        $sql="SELECT * FROM roommate where username='".$rmate."';";
        $result=mysqli_query($con,$sql);
        if(!$result)
        {
            echo 'An error occured. Please try again.';
            exit();
        }
        
        $result= mysqli_fetch_assoc($result);
        if($result['partner']!="")
        {
            echo 'The username you entered has already been alloted a room';
            exit();
        }
        //change with proper function
        $result=genOTP($username,$rmate);
        if($result['valid']==FALSE)
        {
            echo "You already have a pending request for ".$result['otp'].". Please "
                    . "wait for this request to expire before making a new request";
            exit();
        }
        //put propper function
        $result= sendMail($mail_of_receiver, $name_of_sender, $otp);
        if(!result)
        {
            echo 'An error occured. Please try again.';
            remOTP($username);
            exit();
        }
        echo "1";
        exit();
        
        
    }
