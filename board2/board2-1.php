<html>
<head>
    <title>データの登録</title>
</head>
<body>
<form method="POST" action="insert_process.php">
    <p>
        名前<br>
        <input type="text" name="name" size="20" maxlength="20" required>
    </p>
    <p>
        内容<br>
        <textarea  maxlength="500" name="contents" required></textarea>
    </p>
    <input type="submit" value="送信">
</form>
<botan href="board2-2.php" value="ログイン"></botan>
<?php
require_once  'connect.php';
try {
    $db = getDb();
    $stt = $db->prepare('SELECT*from post_table order by id desc');
    $stt->execute();
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <p>
            名前<br>
            <?php echo htmlspecialchars($row['name']); ?><br>
            内容<br>
            <?php echo htmlspecialchars($row['contents']); ?>
        </p>
        <?php
    }
    $db=NULL;
}catch(PDOException $e) {
    die("エラーメッセージ:{$e->getMessage()}");
}
?>
</body>
</html>