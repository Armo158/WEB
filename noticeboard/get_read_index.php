<?php
    $conn = new mysqli('localhost', 'conn', 'Testnote!%89','test');
    $request = $_GET['request'];
    $page = $_GET['page'];
    $word = $_GET['word'];
    $option = $_GET['option'];
    $fromCal = $_GET['fromCal'];
    $toCal = $_GET['toCal'];
    $list_num = 10;
    $page_num = 5;
    $first_board = ($page - 1) * $list_num;
    if($request == 'board'){
        $q = "SELECT bid, id, title, created, hit FROM board WHERE $option LIKE '%$word%'";
        $q1 = "ORDER BY bid DESC LIMIT $first_board, $list_num";

        if(!empty($fromCal)){
            $q .= " AND DATE(created) >= '$fromCal'";
        }
        if(!empty($toCal)){
            $q .= " AND DATE(created) <= '$toCal'";
        }

        $q .= " ".$q1;

        $result = $conn->query($q);
        $rows = array();
    
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
    }
    else if($request == 'page'){
        $block = ceil($page/$page_num); #몇번째 block인지 계산
        $q = "SELECT COUNT(*) FROM board where $option LIKE '%$word%'";
        $q1 = "ORDER BY bid";

        if(!empty($fromCal)){
            $q .= " AND DATE(created) >= '$fromCal'";
        }
        if(!empty($toCal)){
            $q .= " AND DATE(created) <= '$toCal'";
        }

        $q .= " ".$q1;

        $all = $conn->query($q)->fetch_row()[0];
        $end = ceil($all/$list_num); #마지막 페이지 번호
        
        $start_page = ($block - 1) * $page_num + 1; # block의 시작 page
        $end_page = min($end, $block * $page_num); # block의 끝 page
        
        $page_info = array('start_page' => $start_page, 'end_page' => $end_page, 'last_page' => $end);
        $rows['page_info'] = $page_info;
    }

    header('Content-Type: application/json');
    echo json_encode($rows);
    ?>