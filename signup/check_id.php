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
    $userid = $_GET['userid'];
    $conn = new mysqli('localhost', 'conn', 'Testnote!%89','test');
    $q = "SELECT * FROM member WHERE id = '$userid'";
    $result = $conn->query($q);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if(!$result){
        ehco "$userid 는 사용가능한 아이디입니다.";
        <input type="button" value = "이 ID를 사용" onclick="opener.parent.decide(); window.close();">
    }
    else{
        echo "이미 존재하는 아이디입니다.";
        <input type="button" value = "다른 ID 사용" onclick="opener.parent.change(); window.close();">
    }
    ?>
</body>
</html>