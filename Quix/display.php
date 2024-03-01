<?php

use function PHPSTORM_META\sql_injection_subst;

 include ("connect.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <div class="containerForm">
        <form method="post">
            <div>
                <label>Enter your ID : </label>
                <input type="text" name="id" require>
            </div>
            <div>
                <label>Enter your name : </label>
                <input type="text" name="name" require>
            </div>
            <div>
                <label>Enter your sex : </label>
                <select name="sex" require>
                    <option>M</option>
                    <option>F</option>
                </select>
            </div>
            <div>
                <label>Enter your Date of Kirth : </label>
                <input type="date" name="dob" require>
            </div>
            <div>
                <label>Enter your Phone : </label>
                <input type="text" name="phone" require>
            </div>
            <div>
                <button type="submit" name="submit">SUBMIT</button>
                <button type="reset">RESET</button>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $id = mysqli_real_escape_string($con, $_POST['id']); 
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $sex = mysqli_real_escape_string($con, $_POST['sex']);
            $dob = mysqli_real_escape_string($con, $_POST['dob']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $sql = "INSERT INTO `dbe6` (dbid, dbname, dbsex, dbdob, dbphone) VALUES ('$id', '$name', '$sex', '$dob', '$phone')"; 
            $result = mysqli_query($con, $sql); 
            if($result){
                echo "Data inserted successfully!"; 
            }else{
                die(mysqli_error($con)); 
            }
        }
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>DOB</th>
                <th>PHONE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `dbe6`"; 
                $result = mysqli_query($con, $sql); 
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['dbid']; 
                        $name = $row['dbname'];
                        $sex = $row['dbsex'];
                        $dob = $row['dbdob'];
                        $phone = $row['dbphone'];
                        echo '
                            <tr>
                                <th>'.$id.'</th>
                                <th>'.$name.'</th>
                                <th>'.$sex.'</th>
                                <th>'.$dob.'</th>
                                <th>'.$phone.'</th>
                            </tr>
                        '; 
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>