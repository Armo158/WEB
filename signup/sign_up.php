<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./sign_up.js"></script>
</head>
<body>
    <form method = "post", action = "register.php" class = "signupform">
        <div class = "idForm">
            <input type="text" name = "id" id="id" placeholder="ID">
            <input type="hidden" name="decide_id" id="decide_id">
            <span id="decide" style='color:red;'>ID 중복 여부를 확인해주세요.</span>
            <input type="button" id ="checkID" value = "Check ID" onclick="checkid();">
        </div>
        <div class = "emailForm">
            <input type="text" name = "email" class="email" placeholder="Username">
        </div>
        <div class = "addressForm">
            <input type="text" name = "Roadaddr" id = "Roadaddr" style = "width:400px" placeholder="도로명 주소">
            <input type="hidden" name = "Decide_Roadaddr" id = "Decide_Roadaddr">
            <input type="text" name = "ExtraRoadaddr" id = "ExtraRoadaddr" style = "width:400px" placeholder="상세 주소">
            <input type="button" id = "CheckAddr" value = "Input Address" onclick="Input_Address();">
        </div>
        <div class = "passForm">
            <input type="password" name = "pw" class= "pw" placeholder="Password">
        </div>
        <div class = "passForm">
            <input type="password" name = "pwcheck" class= "pwcheck" placeholder="Password">
        </div>
        <input type="submit" id="register_button" value="register!" disabled=true>
    </form>   
</body>
</html>