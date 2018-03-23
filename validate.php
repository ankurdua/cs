<?php
function validate($username,$otp){ 
$server="mysql";
$db_username="abc";
$db_password="123";
$db_name="db";
$conn = mysqli_connect($server,$db_username,$db_password,$db_name);
if(! $conn ) {
   die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully<br>';
$sql="SELECT roommatename,otp,time1 FROM table1 WHERE username='".$username."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
        $now = now();
        if($row["otp"]==$otp && ($now-$row["time1"])<1000)
        return array("valid" => true,"partner" => $row["roommatename"]);
        else 
        return array("valid" => false,"partner" => "");
} else {
    return array("valid" => false,"partner" => "");
}
mysqli_close($conn);
}
?>
