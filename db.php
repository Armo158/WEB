<?php
header('Content-Type: text/html; charset=utf-8');

$mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
$mysqli->set_charset('utf8');

function mq($q){
    global $mysqli;
    $mysqli->query($q);
}

?>