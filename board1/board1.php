<?php
require_once 'DbManager.php';
require_once 'Encode.php';
?>
<html>
<head>
    <title>掲示板1</title>
</head>
<body>
<table border="1">
    <tr>
        <th>id</th><th>name</th><th>contents</th>
    </tr>
    <?php
    try{
        //データベースへの接続を確立
        $db = getDb();
        //SELECT命令の実行
        $stt = $db->prepare('SELECT * FROM post_table ORDER BY contents DESC');
        $stt->execute();
        //結果セットの内容を順に出力
        while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php e($row['id']); ?></td>
                <td><?php e($row['name']); ?></td>
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
<form method="POST" action="insert_process.php">
    <p>
        投稿者名:<br />
        <input type="text" name="name" size="25" maxlength="10" />
    </p><p>
        本文:<br />
        <input type="text" name="contents" size="100" maxlength="200" />
    </p><p>
        <input type="submit" />
    </p>
</form>
</body>
</html>