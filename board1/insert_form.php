<html>
<head>
    <title>データの登録</title>
</head>

<body>
<form method="POST" action="insert_process.php">
    <p>
        ID:<br />
        <input type="text" name="id" size="25" maxlength="20" />
    </p><p>
        名前:<br />
        <input type="text" name="name" size="25" maxlength="150" />
    </p><p>
        内容:<br />
        <input type="text" name="contents" size="25" maxlength="500" />
    </p><p>
        <input type="submit" value="投稿">
    </p>
</form>

<head>
    <title>結果セット</title>
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th><th>名前</th><th>内容</th>
    </tr>
    <?php
    require_once './DbManager.php';
    require_once  './Encode.php';
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