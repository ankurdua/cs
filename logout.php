<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        session_start();
        session_destroy();
        $_SESSION=array();
    }
?>