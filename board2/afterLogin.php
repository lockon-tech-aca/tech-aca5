<?php
session_start();
require_once 'DbManager.php';
require_once 'Encode.php';
?>
<html>
<head>
    <title>掲示板2</title>
</head>
<body>
<table border="1">
    <tr>
        <th>投稿id</th><th>投稿者id</th><th>投稿内容</th>
    </tr>
    <?php
    try{
        //データベースへの接続を確立
        $db = getDb();
        //SELECT命令の実行
        $stt = $db->prepare('SELECT * FROM post_table ORDER BY id ASC');
        $stt->execute();
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
</table><br>
<form method="POST" action="insert_process_post.php">
    <p>
        投稿者ID:<br />
        <input type="text" name="user_id" size="25" maxlength="10" />
    </p><p>
        本文:<br />
        <input type="text" name="contents" size="100" maxlength="200" />
    </p><p>
        <input type="submit" />
    </p>
</form>
<input type="button" onclick="php:location.href='update.php'" value="投稿の編集" />
<input type="button" onclick="php:location.href='delete.php'" value="投稿の削除" />
<?php
echo $_SESSION['user_id'];
echo $_SESSION['name_login'];
?>
</body>
</html>