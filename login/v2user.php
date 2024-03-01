<?php
    include 'v2connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>

    <div class="container">
        <form method="post">
            <div>
                <label>Enter your name : </label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Select your sex : </label>
                <select name="sex">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div>
                <label>Select your DOB : </label>
                <input type="date" name="date">
            </div>
            <div>
                <label>Enter your phone : </label>
                <input type="text" name="phone">
            </div>
            <div>
                <button type="submit" name="submit">SUBMIT</button>
                <button type="reset">RESET</button>
            </div>  
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $sex = mysqli_real_escape_string($con, $_POST['sex']);
            $date = mysqli_real_escape_string($con, $_POST['date']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);

            $sql = "INSERT INTO `e6` (name, sex, dob, mobile) VALUES ('$name', '$sex', '$date', '$phone')"; 

            $result = mysqli_query($con, $sql); 

            if ($result){
                echo "Data inserted successfully!"; 
            }else{
                die(mysqli_error($con)); 
            }
        }
    ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Sex</th>
                <th>DOB</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `e6`";
                $result = mysqli_query($con, $sql); 

                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id']; 
                        $name = $row['name'];
                        $sex = $row['sex'];
                        $dob = $row['dob'];
                        $phone = $row['mobile'];

                        echo '
                            <tr>
                                <th>'.$id.'</th>
                                <td>'.$name.'</td>
                                <td>'.$sex.'</td>
                                <td>'.$dob.'</td>
                                <td>'.$phone.'</td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>
