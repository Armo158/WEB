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