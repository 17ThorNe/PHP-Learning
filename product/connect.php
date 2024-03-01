<?php
    $con = new mysqli('localhost', 'root', '', 'product'); 
    if(!$con){
        die(mysqli_error($con));
    }
?>