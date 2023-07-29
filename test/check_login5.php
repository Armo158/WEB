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

        $q1 = "SELECT uid FROM member where id = '$username'"
        $q2 = "SELECT uid FROM member where pw = '$userpass'"
        $q = replace(' union ', '', strtolower($q1));
        $result1 = $mysqli->query($q);
        $q = replace('union', '', strtolower($q2));
        $result2 = $mysqli->query($q);

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