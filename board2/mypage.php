<?php
  require_once './Encode.php';     // e関数の有効化
  session_start();

  // ログイン状態チェック
  if (!isset($_SESSION["id"])) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login_form.php');
    die;
  }

?>

<html>
    <head>
        <title>マイページ</title>
    </head>
    <body>
        <p>ようこそ<u><?php e($_SESSION["name"]); ?></u>さん</p>
        <!-- 投稿の管理できるやつつくる -->
        <ul>
            <li><a href="login_form.php">ログアウト</a></li>
        </ul>
    </body>
</html>
