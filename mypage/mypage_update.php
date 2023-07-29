<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>location.replace('login.php');</script>";
    }
    else{
        $id = $_SESSION['id'];
        $change_id = $_POST['id'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $passwd = $_POST['check_passwd'];
        $q = "UPDATE member SET ";
        $q1 = " WHERE id = '$id'";

        $updateFields = array();

        if(!empty($change_id)){
            $updateFields[] = "id = '$change_id'";
        }
        if(!empty($email)){
            $updateFields[] = "email = '$email'";
        }
        if(!empty($addr)){
            $updateFields[] = "addr = '$addr'";
        }
        if(!empty($passwd)){
            $updateFields[] = "pw = '$passwd'";
        }
        
        if(!empty($updateFields)){
            $q .= implode(", ", $updateFields).$q1;
        
            $mysqli = new mysqli('localhost', 'conn', 'Testnote!%89', 'test');
        
            $result = $mysqli->query($q);
            if($result){
                echo "<script>location.href='logout.php';</script>";
            }
            else{
                echo "<script>alert('문제 발생!');</script>";
                echo "<script>location.href='mypage.php';</script>";
            }
        }
    }
?>