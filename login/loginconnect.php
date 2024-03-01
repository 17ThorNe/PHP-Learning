<?php

    $con = new mysqli('localhost', 'root', '', 'user'); 

    if(!$con){
        die(mysqli_error($con)); 
    }else{
        echo "Hello world!"; 
    }
?>