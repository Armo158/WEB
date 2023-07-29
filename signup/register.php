<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'conn';
    $pw = 'Testnote!%89';
    $db_name = 'test';
        $mysqli = new mysqli($host, $user, $pw, $db_name);

        $username = $_POST['decide_id'];
        $userpass = $_POST['pw'];
        $useremail = $_POST['email'];
        $useraddress = $_POST['Decide_Roadaddr'].$_POST['ExtraRoadaddr'];

        #$q = "SELECT * FROM member WHERE id = '$username' AND pw = '$userpass'"
        $q = "INSERT INTO member(id, email, addr, pw, created) VALUES ('$username', '$useremail', '$useraddress', '$userpass', default)";
        $result = $mysqli->query($q);

        if($result == TRUE){
            echo "<script>alert('You have been registered as a member.')</script>";
            echo "<script>location.replace('login.php');</script>";
            exit;
        }
        else{
            echo "<script>alert('It has been error!')</script>";
            echo "<script>location.replace('sign_up.php')</script>";
            exit;
        }
    ?>
</body>
</html>