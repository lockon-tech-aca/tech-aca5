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
<h3>新規登録</h3>
<form action="insert_process_signUp.php" method="post">
    username:<input type="text" name="name_signUp"><br />
    password:<input type="text" name="password_signUp"><br />
    <input type="submit" name="register" value="登録">
</form><br />

<h3>ログイン</h3>
<form action="login.php" method="post">
    username:<input type="text" name="name_login"><br />
    password:<input type="text" name="password_login"><br />
    <input type="submit" name="login" value="ログイン">
</form><br>

<h3>投稿一覧</h3>
<table border="1">
    <tr>
        <th>投稿id</th><th>投稿者id</th><th>投稿内容</th>
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
                <td><?php e($row['user_id']); ?></td>
                <td><?php e($row['contents']); ?></td>
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