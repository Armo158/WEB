<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./read_index.js"></script>
</head>
<body onload = "load()">
    <?php
        session_start();
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        $word = $_GET['word'];
        $option = $_GET['option'];
        $fromcal = $_GET['fromCal'];
        $tocal = $_GET['toCal'];
        $AD = $_GET['AD'];
        if(!isset($_SESSION['id'])){?>
            <input type="button" name = "login" id = "login" value="login" onclick = gotologin()><?php
        }
        else{?>
            <input type="post" name = "write" id = "write" value = "write" onclick = gotowrite()><?php
        }
    ?>
    <table>
    <thead>
        <tr>
            <td width="70">번호</td>
            <td width="500">제목</td>
            <td width="120">글쓴이</td>
            <td width="100">작성일</td>
            <td width="100">조회수</td>
        </tr>
    </thead>
    <tbody name = "result" id = "result">
    </tbody>
    </table>
    <input type="hidden" name="cur_page" id = "cur_page" value = <?php echo $page; ?> >
    <p class = "pagerclass" id = "pager">
    </p>
    <select name="option_AD" id="option_AD">
        <option value="DESC" <?php if($AD === 'DESC') echo 'selected'?> >내림차순</option>
        <option value="ASC" <?php if($AD === 'ASC') echo 'selected'?> >오름차순</option>
    </select>
    <select name="option_sort" id="option_sort">
        <option value="created"></option>
        <option value="id"></option>
        <option value="like"></option>
    </select>
    <select name="option_val" id="option_val" value = <?php echo $option?> >
        <option value="title" <?php if ($option === 'title') echo 'selected'; ?> >title</option>
        <option value="id" <?php if ($option === 'id') echo 'selected'; ?> >username</option>
        <option value="detail" <?php if ($option === 'detail') echo 'selected'; ?>>detail</option>
    </select>
    <input type="text" name="cur_word" id="cur_word" value = <?php echo $word;?> >
    <input type="date" name="fromCal" id="fromCal" value = <?php echo $fromcal?> >
    <input type="date" name="toCal" id="toCal" value = <?php echo $tocal?> >
    <input type="submit" value="find" onclick="newload()">
</body>
</html>