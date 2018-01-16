<?php
require_once 'DbManager.php';
session_start();

try {
    $db = getDb();
    $stt = $db->prepare('DELETE FROM post_table where id =:id');
    $stt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stt->execute();
    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
?>