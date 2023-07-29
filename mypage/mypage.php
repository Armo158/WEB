<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="mypage.js"></script>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['id'])){
            echo "<script>location.replace('login.php');</script>";
        }
        else{
            $id = $_SESSION['id'];
            $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
            $q = "SELECT id, email, addr from member where id = '$id'";
            $result = ($mysqli->query($q))->fetch_array(MYSQLI_ASSOC);
        ?>
            <form action="mypage_update.php" method="post" onsubmit="check()">
                <input type="text" name="id" id="id" placeholder="<?php echo $result['id']?>">
                <input type="text" name="email" id="email" placeholder="<?php echo $result['email']?>">
                <input type="text" name="addr" id="addr" placeholder="<?php echo $result['addr']?>">
                <input type="text" name="passwd" id="passwd">
                <input type="text" name="check_passwd" id="check_passwd">
                <input type="submit" value="수정하기">
            </form>
        <?php}
    ?>
</body>
</html>