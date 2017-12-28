<?php
require_once 'DbManager.php';
require_once 'Encode.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>掲示板2</title>
</head>
<body>
新規登録
<form action="insert_process_signUp.php" method="post">
    username:<input type="text" name="name_signUp"><br />
    password:<input type="text" name="password_signUp"><br />
    <input type="submit" name="register" value="登録">
</form><br />

ログイン
<form action="login.php" method="post">
    username:<input type="text" name="name_login"><br />
    password:<input type="text" name="password_login"><br />
    <input type="submit" name="login" value="ログイン">
</form><br>

投稿一覧
<table border="1">
    <tr>
        <th>id</th><th>contents</th><th>user_id</th>
    </tr>
    <?php
    try{
        $db = getDb();
        $stt = $db->query('SELECT * FROM post_table ORDER BY id ASC');
        //結果セットの内容を順に出力
        while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php e($row['id']); ?></td>
                <td><?php e($row['contents']); ?></td>
                <td><?php e($row['user_id']); ?></td>
            </tr>
            <?php
        }
        $db = NULL;
    }catch(PDOException $e){
        die("エラーメッセージ : {$e->getMessege()}");
    }
    ?>
</table>
</body>
</html>