<?php
    $localhost = 'localhost'; 
    $user = 'root'; 
    $password = ''; 
    $database = 'stu'; 
    $con = new mysqli($localhost, $user, $password, $database); 
    if(!$con){
        die(mysqli_error($con)); 
    }
?>