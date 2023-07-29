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
        session_start();
        if(!isset($_SESSION['id'])){
            echo "<script>alert('Wrong path!');</script>";
            echo "<script>history.back();</script>";
            exit;
        }
        $id = $_SESSION['id'];
        # 로그인을 해야만 접근 가능
        $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');//host, user, pw, db_name, you need to make table
        $bid = $_POST['bid'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];

        if(!empty($bid)){# modify
            $q = "SELECT id from board where bid = $bid"; # 전달 받은 bid 값이 올바른 값인지 확인
            $result = ($mysqli->query($q))->fetch_array(MYSQLI_ASSOC);
            if($result['id'] != $_SESSION['id']){
                echo "<script>alert('Wrong path!')</script>";
                echo "<script>location.replace('read_index.php');</script>";
                exit;
            }
            $q = "UPDATE board SET title = '$title', detail = '$detail' where bid = '$bid'";
        }
        else{# write
            $error = $_FILES['upfile']['error'];
            $tmpfile = $_FILES['upfile']['tmp_name'];
            $filename = $_FILES['upfile']['name'];
            $folder = "./file/upload/".$filename;

            if( $error != UPLOAD_ERR_OK ){
                switch( $error ) {
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            echo "<script>alert('파일이 너무 큽니다.');";
                            echo "window.history.back()</script>";
                            exit;
                }
            }

            move_uploaded_file($tmpfile, $folder);

            $q = "INSERT INTO board(id, title, detail, file, created) VALUES ('$id', '$title', '$detail', '$filename', default)";
        }
        $result = $mysqli->query($q);
        if($result){
            echo "<script>alert('Your request is successfully posted!')</script>";
        }
        else{
            echo "<script>alert('Something is wrong with the server...')</script>";
        }
    ?>
</body>
</html>