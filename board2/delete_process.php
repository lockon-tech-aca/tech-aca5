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
        $stt2 = $db->prepare('DELETE FROM post_table where id =:id');
        $stt2->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stt2->execute();
        $db = NULL;
    }else{
        header( "location: delete_false.php" );
    }
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
//処理後は入力フォームにリダイレクト
if($user_id == $_SESSION['user_id']) {
    header('Location: http://localhost/tech-aca5/board2/afterLogin.php');
}
?>