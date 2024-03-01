<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <form method="post">
        <div>
            <label>Enter Name : </label>
            <input type="text" name="name">
        </div>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name']; 

            echo "Hello".$name; 

        }
    ?>
</body>
</html>