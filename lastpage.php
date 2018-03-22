<?php
    require 'db.php';
	
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $res=new stdClass();
        $res->ret=-1;
        $res->roommatename="";
        $res->hostelname="";
        $res->roomno="";
        session_start();
        if(isset($_SESSION['user'])&&$_SESSION["user"]!="")
        {
            
            $username=$_SESSION["user"];
            $con=mysqli_connect($server,$db_username,$db_password,$db_name);
            if(mysqli_error($con))
            {
                $res->ret=-2;
                $res->sql_err=mysqli_error($con);
                goto a;
            }
			
			//query for the roommate name.
			
            //here the table name is taken as "thetable".
            $sql="SELECT * FROM thetable WHERE roommatename='".$username."';";
            $result=mysqli_query($con, $sql);
            if (!$result) 
			{
				$res->ret=0;
                $res->sql_err=mysqli_error($con);
				goto a:
            }
            $row=mysqli_fetch_assoc($result);
            $res->roommatename=$row["roommatename"];
            if($res->roommatename=="")
			{
				$res->ret=0;
				goto a:
			}
			
			//query for roommate name is complete.
			
			
			//query for hostelname.
			
			//the databse name for hostelname is "hostels".
			$sql="SELECT * FROM hostels WHERE username='".$username."';";
			$result=mysqli_query($con, $sql);
			if (!$result) 
			{
				$res->ret=0;
                $res->sql_err=mysqli_error($con);
				goto a:
            }
			$row=mysqli_fetch_assoc($result);
			$res->hostelname=$row["hostelname"];
			if($res->hostelname=="")
			{
				$res->ret=0;
                $res->sql_err=mysqli_error($con);
				goto a:
			}
			
			//query for hostelname is complete.
			
			
			
			//query for roomno is yet to be done...................................
			
			$res->roomno=$roomno;
			
			//.....................................................................
			
            $res->ret=1;
        }
        a:
        echo json_encode($res);
    }
?>