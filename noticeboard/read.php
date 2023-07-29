<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="read.js"></script>
    <style>
		h2 {text-align: center;}
		h5 {text-align: right;}
		h4 {text-align: left;}
	</style>
</head>
<body>
    <?php
    session_start();
    $id = '';
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    $bid = $_GET['bid'];
    $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');

    $q = "UPDATE board SET hit = hit + 1 where bid = $bid";
    $result = $mysqli->query($q);

    $q = "SELECT * from board WHERE bid = '$bid'";
    $result = $mysqli->query($q);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if($id == $row['id']){?>
        <form>
        <input type="hidden" name = "bid" id = "bid" value = <?php echo $bid;?> >
        <input type="button" name = "modify" id = "modify" value = "수정" onclick="modify();">
        <Input type="button" name = "remove" id = "remove" value = "삭제" onclick="remove();">
        </form>
    <?php } ?>
    <div class = "detail_view">
        <h4>번호: <?php echo $row['bid']; ?> 제목: <?php echo $row['title']; ?> 작성자: <?php echo $row['id']; ?></h4>
        <h6>작성일: <?php echo $row['created'];?> 조회수: <?php echo $row['hit'];?><h6>
        <h5><?php echo $row['detail'];?><h5>
        
    </div>
    <div>
        <p><a href="download.php?file=<?php echo $row['file'];?>"> <?php echo $row['file'];?> 다운하기</a></p>
    </div>
</body>
</html>