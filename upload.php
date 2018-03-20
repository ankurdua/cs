<?php
    
    
    $file=$_FILES["file"];
    $target_dir=dirname(__FILE__)."/uploads/a.jpg";
    if ($file['error'] > 0) 
    {
        die('An error occured while upload error code=' . $file['error']);
    }
    echo $file["tmp_name"].'<br>';
    $status=  move_uploaded_file($file["tmp_name"], $target_dir);
    if(!$status)
    {
        die('An error occured during move<br>'.$target_dir.$file['error']);
    }
    else
    {
        die('File upload successful');
    }
?>
