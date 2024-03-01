<?php

    $con = new mysqli('localhost', 'root', '', 'student'); 

    if(!$con){
        die(mysqli_error($con)); 
    }

?>