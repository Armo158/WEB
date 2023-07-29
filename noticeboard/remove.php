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
    $bid = $_GET['bid'];
    $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
    $q = "SELECT id from board where bid = '$bid'";
    $row = ($mysqli->query($q))->fetch_array(MYSQLI_ASSOC);

    if($row['id'] != $id){
        echo "<script>alert('Wrong path!');</script>";
        echo "<script>location.replace('read_index.php')</script>";
    }
    $q = "DELETE from board where bid = '$bid'";
    $row = $mysqli->query($q);

    if($row){
        echo "<script>alert('This Post was removed!');</script>";
        echo "<script>location.replace('read_index.php')</script>";
    }
    else{
        echo "<script>alert('Error! Something has been wrong!');</script>";
        echo "<script>location.replace('read_index.php')</script>";
    }
    ?>
    
</body>
</html>