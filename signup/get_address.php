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
        $conn = new mysqli('localhost', 'conn', 'Testnote!%89','test');
        $q = $_GET['query'];
        $result = $conn->query($q);
        $rows = array();

        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($rows);
    ?>
</body>
</html>