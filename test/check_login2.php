<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    session_start();
    $host = 'localhost';
    $user = 'conn';
    $pw = 'Testnote!%89';
    $db_name = 'test';
        $mysqli = new mysqli($host, $user, $pw, $db_name);

        $username = $_POST['id'];
        $userpass = $_POST['pw'];

        $q = "SELECT uid
	    FROM member m1 
	    JOIN member m2 ON m2.pw = '$userpass' AND m1.uid = m2.uid WHERE m1.id = '$username'"

        $result = $mysqli->query($q);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if($result1 == $result2){
            $_SESSION['username'] = $row['id'];
            $_SESSION['name'] =  $row['name'];
            echo "<script>location.replace('index.php');</script>";
            exit;
        }
        else{
            echo "<script>alert('Invalid username or password')</script>";
            echo "<script>location.replace('login.php')</script>";
            exit;
        }
    ?>
</body>
</html>
