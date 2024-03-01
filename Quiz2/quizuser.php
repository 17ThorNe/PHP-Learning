<?php

include('connectquiz.php');
$querylist = 'mysqli_real_escape_string';
$mq = 'mysqli_query';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="name">Enter Name: </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="sex">Enter Sex: </label>
            <select name="sex" id="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div>
            <label for="phone">Enter Phone: </label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <button type="submit" name="submit">SUBMIT</button>
            <button type="reset" name="reset">RESET</button>
            <button type="submit" name="update">UPDATE</button>


            <form action="" method="post">
                <?php
                $sql = "SELECT * FROM `stue6`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo '<select name="itemUpdate">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        echo '<option value="' . $id . '">' . $row['stuname'] . '</option>';
                    }
                    echo '</select>';
                }
                ?>
            </form>
        </div>
    </form>


    <?php
        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $sex = mysqli_real_escape_string($con, $_POST['sex']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);

            $sql = "INSERT INTO `stue6` (stuname, stusex, stuphone) VALUES ('$name','$sex','$phone')";

            $result = mysqli_query($con, $sql);

            if (!$result) { 
                die(mysqli_error($con));
            }
            header("Location:quizuser.php"); 
            exit(); 
        }
    ?>
    <?php
        if (isset($_POST['update'])) {
            $selectedItem = $_POST['itemUpdate'];
            echo '<script>window.location.href="quizupdate.php?id=' . $selectedItem . '"</script>';
        }
    ?>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>PHONE</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM `stue6`";
            $result = mysqli_query($con, $sql);

             

            $sql = "SELECT * FROM `stue6`";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['stuname'];
                    $sex = $row['stusex'];
                    $phone = $row['stuphone'];

                    echo '
                        <tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $sex . '</td>
                            <td>' . $phone . '</td>
                        </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>
