<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ESS2</title>
    </head>

    <body>
    <h2>掲示板2</h2><br>

    <?php
    session_start();
    //var_dump($_SESSION['username']);
    if(isset($_SESSION['username'])){
        $name=$_SESSION['username'];

        //var_dump($_SESSION['error']);
        if (isset($_SESSION['error'])){
            print $_SESSION['error'];
        }
    ?>
        <p>ようこそ<?php print $name; ?>さん</p>
        <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/logout.php'"value="ログアウト"><br>
        <form method="post" action="insert.php">
        投稿：<br>
        <textarea name="contents" row="8" cols="40"></textarea><br>
        <input type="submit">
        </form>

    <?php
    }else{
    ?>
        <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/user_create.php'"value="新規登録">
        <input type="button" onclick="location.href='http://localhost/tech-aca5/board2/login.php'"value="ログイン">
    <?php
    }
    ?>
    </body>
</html>

<?php

//接続
require('db_connection.php');

try {
    $statement = $pdo->query("select * from post_table");
    //var_dump();
    foreach ($statement as $row) {
        echo $row['id'].':'.$row['user_id'].'<br>';
        echo $row['contents'];
        echo '<br>';
        //var_dump($row);
    }
} catch ( PDOException $e ) {
    print "エラー:{$e->getMessage()}";
}