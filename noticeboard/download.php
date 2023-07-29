<?php
    $file = $_GET['file'];
    $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
    $q = "SELECT filedetail, file from board where file = '$file'";

    $result = $mysqli->query($q);

    $filedetail = $result['filedetail'];
    $filename = $result['file'];
    
    if($result && !empty($filedetail)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($filedetail));
        echo $filedetail;
        exit;
    }
    else{
        echo "File not Found!";
    }
?>