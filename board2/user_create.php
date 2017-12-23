<?php
session_start();
if (isset($_SESSION['reg_error'])){
    print $_SESSION['reg_error'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
        <h2>新規登録</h2>
        <form method="post" action="registration.php">
            ユーザ名：<input type="text" name="name"><br>
            パスワード：<input type="password" name="password"><br>
            もう一度パスワードを入力してください：<input type="password" name="confirmation">
            <input type="submit" value="登録">
        </form>
    </body>
</html>

