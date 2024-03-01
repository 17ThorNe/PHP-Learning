<?php
    $host = "localhost"; 
    $dbname = "product";
    $username = "root"; 
    $password = "";
    
    $pdo = new PDO("mysql:host=$host; dbname = $dbname", $username, $password); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    if(!$pdo){
        echo 'Connect failed!'; 
    }
?>