<?php include ("connect.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="id">Enter id : </label>
            <input type="text" name="id" placeholder="enter id of product">
        </div>
        <div>
            <label for="name">Enter name : </label>
            <input type="text" name="name" placeholder="enter name of product">
        </div>
        <div>
            <label for="type">Select type : </label>
            <select name="type" id="">
                <option value="Food">Food</option>
                <option value="Drink">Drink</option>
            </select>
        </div>
        <div>
            <label for="price">Enter price : </label>
            <input type="text" name="price" placeholder="enter price of product">
        </div>
        <div>
            <label for="date">Select the Date : </label>
            <input type="Date" name="date">
        </div>
        <div>
            <button type="submit" name="btninsert">INSERT</button>
        </div>
    </form>
    <?php
        $host = "localhost";
        $dbname = "product";
        $username = "root";
        $password = "";
    
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            if(isset($_POST['btninsert'])){
                $i = $_POST['id'];
                $n = $_POST['name'];
                $t = $_POST['type'];
                $p = $_POST['price'];
                $d = $_POST['date'];
    
                $query = "INSERT INTO `item`(`proCode`, `proName`, `proType`, `proPrice`, `proDate`) VALUES (:i, :n, :t, :p, :d)";
                $result = $pdo->prepare($query);
    
                // Execute the query after selecting the database
                $execute = $result->execute(array(":i"=>$i,":n"=>$n,":t"=>$t,":p"=>$p,":d"=>$d));
    
                if($execute){
                    echo "Data inserted to your database!";
                } else {
                    echo "Data insert failed!";
                }
            }
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    ?>
</body>
</html>