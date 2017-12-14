<?php
require_once '../Dbmanagerforselfphp.php';
require_once '../Encode.php';
?>
<html>
<head>
    <title>結果セット</title>
</head>
<body>
<table border = "1">
    <tr>
        <th>ISBNコード</th><th>書名</th><th>価格</th><th>出版社</th><th>出版日</th>
    </tr>
    <?php
    try{
        $db = getDb();
        $stt = $db-> prepare('SELECT *　FROM book ORDER BY published DESC');
        $stt->execute();
        while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            ?>
    <tr>
        <td><?php　e($row['isbn'] ); ?></td>
        <td><?php　e($row['title'] ); ?></td>
        <td><?php　e($row['price'] ); ?>円</td>
        <td><?php　e($row['publish'] ); ?></td>
        <td><?php　e($row['published'] ); ?></td>
    </tr>
    <?php
        }
        $db = NULL;
    }catch(PDOException $e) {
        die("エラーメッセージ:{$e->getMessage()}");
    }
    ?>
</table>
</body>
</html>
