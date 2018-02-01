<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ESS1</title>
    </head>
    <body>
        <h2>掲示板１</h2><br>
        <?php
        session_start();
        //var_dump($_SESSION['error']);
            if (isset($_SESSION['error'])){
                print $_SESSION['error'];
            }
        ?>
        <form method="post" action="insert.php">
            名前：<input type="text" name="name"><br>
            投稿：<br>
            <textarea name="contents" row="8" cols="40"></textarea><br>
            <input type="submit">
        </form>

    </body>
</html>

<?php
//接続
require('db_connection.php');

try {
    $statement = $pdo->query("select * from post_table");
    //var_dump($stt);
    foreach ($statement as $row) {
     echo $row['id'].':'.$row['name'].'<br>';
     echo $row['contents'];
     echo '<br>';
     //var_dump($row);
    }
} catch ( PDOException $e ) {
    print "エラー:{$e->getMessage()}";
}