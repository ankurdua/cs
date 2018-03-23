<?php
    function delete_entry_by_partner($username){
        $server="mysql";
        $db_username="abc";
        $db_password="123";
        $db_name="db";
        $conn = mysqli_connect($server,$db_username,$db_password,$db_name);
        if(! $conn ) {
        die('Could not connect: ' . mysqli_error());
        }
        echo 'Connected successfully<br>';
        $sql = "DELETE FROM table1 WHERE roommatename='".$username."'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>