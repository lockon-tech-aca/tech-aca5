<?php
require_once 'DbManager.php';
session_start();

try {

    //データベースの接続を確立
    $db = getDb();
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO post_table(contents, user_id) VALUES(?, ?)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(1, $_POST['contents']);
    $stt->bindValue(2, $_SESSION['user_id']);
    //INSERT命令を実行
    $stt->execute();
    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
?>