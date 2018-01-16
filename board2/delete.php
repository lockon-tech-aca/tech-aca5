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
投稿一覧
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
<form method="POST" action="delete_process_post.php">
    <p>
        投稿ID:<br />
        <input type="text" name="id" size="25" maxlength="10" />
    </p<p>
        <input type="submit" />
    </p>
</form>
</body>
</html>