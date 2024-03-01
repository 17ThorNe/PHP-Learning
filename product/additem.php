<?php include ("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>

    <?php 
        if (isset($_POST['submit'])){
            $code = mysqli_real_escape_string($con, $_POST['code']); 
            $name = mysqli_real_escape_string($con, $_POST['name']); 
            $type = mysqli_real_escape_string($con, $_POST['type']); 
            $price = mysqli_real_escape_string($con, $_POST['price']); 
            $date = mysqli_real_escape_string($con, $_POST['date']); 
            $sql = "INSERT INTO `item` (proCode, proName, proType, proPrice, proDate) VALUES ('$code', '$name', '$type', '$price', '$date')"; 
            $result = mysqli_query($con, $sql); 
            if ($result){
                echo "Data inserted successfully!"; 
            }else{
                die(mysqli_error($con)); 
            }
        }
    ?>

    <form method="post">
        <div>
            <label>Enter Product Code : </label>
            <input type="text" name="code">
        </div>
        <div>
            <label>Enter Product Name : </label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Select Product Type</label>
            <select name="type">
                <option>Drink</option>
                <option>Food</option>
            </select>
        </div>
        <div>
            <label>Enter Product Price : </label>
            <input type="text" name="price">
        </div>
        <div>
            <label>Enter Product Date : </label>
            <input type="date" name="date">
        </div>
        <div>
            <button type="submit" name="submit">SUBMIT</button>
            <button type="reset">RESET</button>
            <button><a href="display.php">Back To Display</a></button>
        </div>
    </form>

</body>
</html>