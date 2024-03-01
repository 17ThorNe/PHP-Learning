<?php
    include ("pdoconnect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="code">Enter code : </label>
            <input type="text" name="code">
        </div>
        <div>
            <label for="name">Enter Name : </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="type">Enter type : </label>
            <input type="text" name="type">
        </div>
        <div>
            <label for="price">Enter price : </label>
            <input type="text" name="price">
        </div>
        <div>
            <label for="date">Enter date : </label>
            <input type="date" name="date">
        </div>
        <div>
            <button type="submit" name="btninsert">INSERT</button>
            <button type="submit" name="btndisplay">DISPLAY</button>
            <button type="reset">RESET</button>
        </div>
    </form>
    <?php
        if(isset($_POST['btninsert'])){
            $code = $_POST['code'];  
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $date = $_POST['date'];
            $pdoquery = "INSERT INTO `item`(`proCode`, `proName`, `proType`, `proPrice`, `proDate`) VALUES (:code, :name, :type, :price, :date)"; 
            $pdoresult = $pdo->prepare($pdoquery); 
            $pdoexec = $pdoresult->execute(array(":code"=>$code, ":name"=>$name, ":type"=>$type, ":price"=>$price, ":date"=>$date));
            
            if($pdoexec){
                echo "Data inserted to your basedata!"; 
            }else{
                echo "Data insert failed!"; 
            }
        }
        if(isset($_POST['btndisplay'])){
            try {        
                $selectQuery = "SELECT * FROM `item`";
                $pdoresult = $pdo->query($selectQuery);
                $rows = $pdoresult->fetchAll(PDO::FETCH_ASSOC);
        
                echo '<table border="1">';
                echo '<tr>
                        <th>proCode</th>
                        <th>proName</th>
                        <th>proType</th>
                        <th>proPrice</th>
                        <th>proDate</th>
                    </tr>';
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td>'.$row['proCode'].'</td>';
                    echo '<td>'.$row['proName'].'</td>';
                    echo '<td>'.$row['proType'].'</td>';
                    echo '<td>'.$row['proPrice'].'</td>';
                    echo '<td>'.$row['proDate'].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }        
    ?>

</body>
</html>