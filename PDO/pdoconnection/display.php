<?php 
    $host = "localhost";
    $dbname = "product";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
        td{
            text-align: center;
            color: orange;
        }
    </style>
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
        try {    
            if(isset($_POST['btninsert'])){
                $i = $_POST['id'];
                $n = $_POST['name'];
                $t = $_POST['type'];
                $p = $_POST['price'];
                $d = $_POST['date'];
    
                $query = "INSERT INTO `item`(`proCode`, `proName`, `proType`, `proPrice`, `proDate`) VALUES (:i, :n, :t, :p, :d)";
                $result = $pdo->prepare($query);

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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_POST['btninsert'])){
                    $selectQuery = "SELECT * FROM `item`"; 
                    $result = $pdo->query($selectQuery); 
            
                    if($result){
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $id = $row['proId']; 
                            $c = $row['proCode'];
                            $n = $row['proName'];
                            $t = $row['proType'];
                            $p = $row['proPrice'];
                            $d = $row['proDate'];
                            
                            echo '
                                <tr>
                                    <td>'.$id.'</td>
                                    <td>'.$c.'</td>
                                    <td>'.$n.'</td>
                                    <td>'.$t.'</td>
                                    <td>'.$p.'</td>
                                    <td>'.$d.'</td>
                                </tr>
                            '; 
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>