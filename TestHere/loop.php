<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="number">Number</label>
            <input type="text" name="number">
        </div>
        <div>
            <button type="submit" name="btnsubmit">SUBMIT</button>
        </div>
    </form>
    <?php
        if(isset($_POST['btnsubmit'])){
            $n = $_POST['number']; 
            if($n == 18){
                echo '
                    <input type = "text"></input>
                '; 
            }else{
                echo "Your are k'mom"; 
            }
            /* for($i = 0; $i < $n; $i++){
                echo ($i+1)." Hello for!"."<br>"; 
            } */ 
        }
    ?>
</body>
</html>