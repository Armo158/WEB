<?php
    $file = $_GET['file'];
    $filesize = filesize($file);
    $filedir = "./file/upload/".$file;

    header('Content-Type: application/x-octetstream');
    header('Content-Length: '.filesize($filedir));
    header('Content-Disposition: attachment; filename='.$file);
    header('Content-Transfer-Encoding: binary');

    $fp = fopen($filedir, "r");
    fpassthru($fp);
    fclose($fp);
?>