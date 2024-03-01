<?php

    /* $con = new mysqli('address', 'root', 'password', 'database name');  */ 

    $con = new mysqli('localhost', 'root', '', 'crudoperation');
    
    if (!$con){
        die(mysqli_error($con));
    }
?>
