<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
</head>
<body>

    <?php

        include 'connect.php'; 

        if(isset($_POST['submit'])){
            $name = $_POST['name']; 
            $email = $_POST['email']; 
            $mobile = $_POST['mobile']; 
            $password = $_POST['password']; 

            $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')"; 

            $result = mysqli_query($con, $sql); 

            if($result){
                echo "Data inserted successfully!"; 
            }else{
                die(mysqli_error($con)); 
            }
        }

    ?>

    <div class="container">
        <form method="post">
            <div class="container_name">
                <label>Please enter your name : </label>
                <input type="text" name="name" placeholder="Enter your name here">
            </div>
            <div class="container_email">
                <label>Please enter your email : </label>
                <input type="email" name="email" placeholder="Enter your email here">
            </div>
            <div class="container_mobile">
                <label>Please enter your mobile : </label>
                <input type="text" name="mobile" placeholder="Enter your mobile here">
            </div>
            <div class="container_password">
                <label>Please enter your password : </label>
                <input type="password" name="password" placeholder="Enter your password here">
            </div>
            <div>
                <button type="submit" name="submit">SUBMIT</button>
                <a href="display.php">Back To Display</a>
            </div>
        </form>
    </div>
</body>
</html>
