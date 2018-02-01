<?php
require_once './DBManager.php';
require_once './Encode.php';
?>

<html>
<head>
    <title>結果セット</title>
</head>
<body>
<table border="1">
    <tr>
        <th>名前</th>
        <th>コメント</th>
    </tr>

    <?php
    try{
        $db = getDb();
        $stt = $db->prepare('select * from post_table');
        $stt->execute();
//        var_dump($stt);
        while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            ?>

    <tr>
        <td><?php e($row['name']); ?></td>
        <td><?php e($row['contents']); ?></td>
    </tr>
    <?php
//            var_dump($row);
        }
        $db =NULL;
    } catch (PDOException $e){
        die("エラーメッセージ :{$e->getMessage()}");
    }
    ?>
    <a href="insert_form.php">書き込みページ</a>
</table>
</body>
</html>
