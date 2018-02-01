<?php
require_once  './DbManager.php';   //getDb関数の有効化
require_once  './Encode.php';      //e関数の有効化
?>
<html>
<head>
    <title>結果セット</title>
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th><th>名前</th><th>内容</th>
    </tr>
    <?php
    try {
        //データベースへの接続を確立
        $db = getDb();
        //select命令の実行
        $stt = $db->prepare('SELECT * FROM post_table ORDER BY contents DESC');
        $stt->execute();
        //結果セットの内容を順に出力
        while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php e($row['id']); ?></td>
        <td><?php e($row['name']); ?></td>
        <td><?php e($row['contents']); ?></td>
    </tr>
    <?php
    }
    $db = NULL;
    } catch(PDOExeption $e) {
    die("エラーメッセージ:{$e->getMessage()}");
    }
    ?>
</table>
</body>
</html>
