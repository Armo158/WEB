<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src = './check_address.js'></script>
</head>
<body>
    <input type="text" name="address" id="address" placeholder = "예시) 서울특별시 테헤란로" oninput="handleInput();">
    <input type="button" name = "find" id = "find" value="확인">
    <table>
    <thead>
        <tr>
            <td width="70">우편번호</th>
            <td width="500">도로명</th>
        </tr>
    </thead>
    <tbody name = 'result' id = 'result'>
    </tbody>
    </table>
</body>
</html>