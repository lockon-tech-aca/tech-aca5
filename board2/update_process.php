<?php
require_once 'DbManager.php';
session_start();

try {
    $db = getDb();

    $stt1 = $db->prepare("SELECT user_id FROM post_table WHERE id = :id");
    $stt1->bindValue(':id', $_POST['id']);
    $stt1->execute();
    $user_id = $stt1->fetchColumn();

    if($user_id == $_SESSION['user_id']) {
        $stt2 = $db->prepare('update post_table set contents = :contents, user_id = :user_id where id =:id');
        $stt2->bindValue(':contents', $_POST['contents']);
        $stt2->bindValue(':user_id', $_SESSION['user_id']);
        $stt2->bindValue(':id', $_POST['id']);
        $stt2->execute();
        $db = NULL;
    }else{
        header( "location: update_false.php" );
    }

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
if($user_id == $_SESSION['user_id']) {
    header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
}
?>