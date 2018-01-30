<?php
require_once 'DbManager.php';
session_start();

try {
    $db = getDb();
    $stt = $db->prepare('update post_table set contents = :contents, user_id = :user_id where id =:id');
    $stt->bindValue(':contents', $_POST['contents']);
    $stt->bindValue(':user_id', $_SESSION['user_id']);
    $stt->bindValue(':id', $_POST['id']);
    $stt->execute();
    $db = NULL;

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
?>