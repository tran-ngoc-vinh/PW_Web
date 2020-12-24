
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="./Public/css/frontend/login.css"/>
</head>
<body style="background-image: url('./Public/img/bg.png');">
    <div class="container">
        <form class="form-login" action="?controller=weblogin&action=login" method="POST">
            <div class="row-form">
                <img class="head-logo" src="./Public/img/head_logo.png" alt="logo" >
            </div>
            <div class="row-form">
                <label class="lable-row">Login ID:</label>
                <input class="input-row" name="id"  value="" type="text" placeholder="ログインIDを入力してください"/>
            </div>
            <div class="row-form">
                <label class="lable-row">Password:</label>
                <input class="input-row" name="pass"  value="" type="password" placeholder="パスワードを入力してください"/>
            </div>
            <div class="foot">
                <button class="btn-login" type="submit" name="btnLogin" value="submit">ログイン</button>
            </div>
        </form>
    </div>
</body>
</html>