<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <form method = "post" action="check_login.php" class = "loginForm">
    <h2>Login</h2>
    <div class = "idForm">
        <input type="text" name = "id" class="id" placeholder="Username">
    </div>
    <div class = "passForm">
        <input type="text" name = "pw" class="pw" placeholder="Password">
    </div>
    <button type = "submit" class="btn" onclick="button()">LOGIN</button>
    <div class = "bottomText">
        <a href="#">Sign up</a>
    </div>
    </form>
</body>
</html>
