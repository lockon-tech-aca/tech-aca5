<?php
require_once 'DbManager.php';
session_start();

try {
    $db = getDb();
    $stt = $db->prepare('update post_table set id =:id where contents = :contents');
    $stt->bindValue(':id', $_POST['id']);
    $stt->bindValue(':contents', $_POST['contents']);
    $stt->execute();
    $db = NULL;

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
?>