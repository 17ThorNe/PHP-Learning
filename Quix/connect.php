<?php
    $con = new mysqli('localhost', 'root', '', 'quiz'); 

    if(!$con){
        die(mysqli_error($con)); 
    }
?>