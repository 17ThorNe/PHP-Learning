<?php
include("connect.php");
$querylist = 'mysqli_real_escape_string'; 
$mq = 'mysqli_query';

$id = $_GET['id'];
$sql = "SELECT * FROM `item` WHERE proID = '".$id."'";
$result = $mq($con, $sql);

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['proName'];
        $code = $row['proCode'];
        $type = $row['proType'];
        $price = $row['proPrice'];
        $date = $row['proDate'];

        echo '
        <form method="post">
            <div>
                <label>Enter Product Code : </label>
                <input type="text" name="code" value="'.$code.'">
            </div>
            <div>
                <label>Enter Product Name : </label>
                <input type="text" name="name" value="'.$name.'">
            </div>
            <div>
                <label>Select Product Type</label>
                <select name="type">
                    <option '.($type == 'Drink' ? 'selected' : '').'>Drink</option>
                    <option '.($type == 'Food' ? 'selected' : '').'>Food</option>
                </select>
            </div>
            <div>
                <label>Enter Product Price : </label>
                <input type="text" name="price" value="'.$price.'">
            </div>
            <div>
                <label>Enter Product Date : </label>
                <input type="date" name="date" value="'.$date.'">
            </div>
            <div>
                <button type="submit" name="submit">UPDATE</button>
                <button type="reset">RESET</button>
                <button><a href="display.php">Back To Display</a></button>
            </div>
        </form>';
    }
}
if (isset($_POST['submit'])) {
    $code = $querylist($con, $_POST['code']); 
    $name = $querylist($con, $_POST['name']); 
    $type = $querylist($con, $_POST['type']); 
    $price = $querylist($con, $_POST['price']); 
    $date = $querylist($con, $_POST['date']); 
    $sql = "UPDATE `item` SET proCode='$code', proName='$name', proType='$type', proPrice='$price', proDate='$date' WHERE proID='$id'"; 
    $result = $mq($con, $sql); 
    if ($result) {
        echo "Data updated successfully!"; 
    } else {
        die(mysqli_error($con)); 
    }
}
?>
