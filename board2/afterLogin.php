<?php
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
        <th>user_id</th><th>contents</th>
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
</body>
</html>