<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    else{
        echo "<script>alert('Wrong path!');</script>";
        echo "<script>histroy.back();</script>";
        exit;
    }
    # 로그인 해야 접근 가능
    $title = '';
    $detail = '';
    $bid = $_GET['bid'];

    if(!empty($bid)){# modify
        $username = $_SESSION['id'];
        $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
        $q = "SELECT * from board where bid = '$bid'";
        $row = ($mysqli->query($q))->fetch_array(MYSQLI_ASSOC);

        if($row['id'] != $username){
            echo "<script>alert('Wrong path!');</script>";
            echo "<script>location.replace('read_index.php')</script>";
            exit;
        }
        $title = $row['title'];
        $detail = $row['detail'];
    }
    ?>
    <form method="post" action="write_action.php" class = "writeForm" enctype="multipart/form-data">
        <div>
            <input type="text" name = "title" style="width:600px" id = "title" class = "titleFrom" value = <?php echo $title; ?> >
        </div>
        <div>
            <input type="text" name = "detail" style="width:600px;height:400px" id = "detail" class = "detailForm" value = <?php echo $detail; ?> >
        </div>
        <div>
            <input type="hidden" name="bid" id = "bid" value = <?php echo $bid; ?> >
        </div>
        <div>
            <label for="upfile">첨부파일</label>
            <input type="file" name="upfile" id="upfile">
        </div>
        <button type="submit">작성</button>
        <button type="button" name = "cancel" id = "name" onclick="location.href='read_index.php'">취소</button>
    </form>
</body>
</html>