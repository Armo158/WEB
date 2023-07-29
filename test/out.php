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
        $host = 'localhost';
        $user = 'conn';
        $pw = 'Testnote!%89';
        $db_name = 'test';
        $mysqli = new mysqli($host, $user, $pw, $db_name);
    
        $q = "SELECT * FROM test";
        $result = $mysqli->query($q);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        printf("%d %s %s\n", $row['id'], $row['name'], $row['LK']);
        $result->free();
    ?>
</body>
</html>