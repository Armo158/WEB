<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./read_index.js"></script>
</head>
<body>
    <?php
        session_start();
        $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
        $q = "SELECT bid, id, title, created, hit from board ORDER BY bid DESC LIMIT 0,10";
        $result = $mysqli->query($q);
        
        if(!isset($_SESSION['id'])){?>
            <input type="button" name = "login" id = "login" value="login" onclick = gotologin()><?php
        }
        else{?>
            <input type="post" name = "write" id = "write" value = "write" onclick = gotowrite()><?php
        }
    ?>
    <table>
    <thead>
        <tr>
            <td width="70">번호</td>
            <td width="500">제목</td>
            <td width="120">글쓴이</td>
            <td width="100">작성일</td>
            <td width="100">조회수</td>
        </tr>
    </thead>
    <tbody name = "result" id = "result">
        <?php
            $result->data_seek(0);
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $bid = $row['bid'];
                $id = $row['id'];
                $title = $row['title'];
                $created = $row['created'];
                $hit = $row['hit'];
        ?>
        <tr>
            <td width="70"><?php echo $row['bid'];?></td>
            <td width="500"><a href="./read.php?bid=<?php echo $row['bid'];?>"></a>< <?php echo $title;?>/td>
            <td width="120"><?php echo $row['id'];?></td>
            <td width="100"><?php echo $row['date'];?></td>
            <td width="100"><?php echo $row['hit'];?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <input type="text" name="word" id="word">
    <input type="submit" value="" onclick="findboard()">
</body>
</html>