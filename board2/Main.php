<?php
session_start();

if (!isset($_SESSION["NAME"])){
    header("logout.php");
    exit;
}

?>


<html>
<head>
 <meta charset="UTF-8">
    <title>メイン</title>
</head>

<body>
<h1>メイン画面</h1>
<p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p> <ul><li><a href-"logout.php">ログアウト</a></li></ul></body></html>