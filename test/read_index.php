<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./read_index.js"></script>
</head>
<body onload="findboard()">
    <?php
        session_start();
        if(!isset($_SESSION['id'])){?>
            <input type="button" name = "login" id = "login" value="login" onclick = gotologin()><?php
        }
        else{?>
            <input type="button" name = "write" id = "write" value = "write" onclick = gotowrite()><?php
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
    </tbody>
    </table>
    <input type="text" name="word" id="word">
    <input type="submit" value="find" onclick="findboard()">
</body>
</html>
