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
    ?>
</body>
