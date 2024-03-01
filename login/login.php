<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php
        include ("loginconnect.php");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $sql = "SELECT * FROM `login`";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $loginSuccessful = false;
                while ($row = mysqli_fetch_assoc($result)) {
                    $conditionEmail = $row['email'];
                    $conditionPassword = $row['password'];

                    if ($conditionEmail == $email && $conditionPassword == $password) {
                        $loginSuccessful = true;
                        break;
                    }
                }
                if ($loginSuccessful) {
                    header("Location:../login/display.php"); 
                    exit(); 
                } else {
                    echo "Email or Password Incorrect!";
                }
            } else {
                echo 'Error fetching data: ' . mysqli_error($con);
            }
        }
    ?>

    <div class="containerlogin">
        <form method="post">
            <div>
                <label>Please enter your email : </label>
                <input type="email" name="email">
            </div>
            <div>
                <label>Please enter your password : </label>
                <input type="password" name="password">
            </div>
            <div>
                <button type="submit" name="submit">SUBMIT</button>
                <button type="reset">RESET</button>
            </div>
        </form>
    </div>
</body>
</html>
