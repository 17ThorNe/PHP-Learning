<?php include("connect.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display This Item</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div>
        <button><a href="additem.php">ADD NEW ITEM</a></button>
        <form method="post" action="">
            <?php
                $sql = "SELECT * FROM `item`"; 
                $result = mysqli_query($con, $sql); 
                if($result){
                    echo '<select name="itemUpdate">'; 
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['proId']; 
                        echo '<option value="'.$id.'">'.$row['proName'].'</option>'; 
                    }
                    echo ' </select>'; 
                }
            ?>
            <button type="submit" name="update">UPDATE</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>CODE</th>
                <th>NAME</th>
                <th>TYPE</th>
                <th>PRICE</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $totalPrice = 0; 
                if(isset($_POST['update'])){
                    $selectedItemId = $_POST['itemUpdate'];
                    echo '<script>window.location.href="update.php?id='.$selectedItemId.'";</script>';
                }

                $sql = "SELECT * FROM `item`"; 
                $result = mysqli_query($con, $sql); 
                if ($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['proId'];
                        $code = $row['proCode'];
                        $name = $row['proName'];
                        $type = $row['proType']; 
                        $price = $row['proPrice'];
                        $date = $row['proDate'];
                        $totalPrice += $price; 
                        echo '
                            <tr>    
                                <th>'.$id.'</th>
                                <th>'.$code.'</th>
                                <th>'.$name.'</th>
                                <th>'.$type.'</th>
                                <th>'.$price.'</th>
                                <th>'.$date.'</th>
                            </tr>
                        '; 
                    }
                    echo '
                        <tr>
                            <th colspan="4">Total Price:</th>
                            <th>'.$totalPrice.'$'.'</th>
                            <th></th>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
