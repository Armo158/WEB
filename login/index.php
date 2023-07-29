<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>location.replace('login.php');</script>"
    }
    else{
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
    }
    ?>
<body>
    <div class = "base">
        <h2><?php echo "hi, $username($name)";?></h2>
        <buttton type = "button" class = "btn" onclick = "location.href='logout.php'">
            LOGOUT
        </button>
    </div>
</body>
</html>
