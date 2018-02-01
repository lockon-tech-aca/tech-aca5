<?php
require_once 'DbManager.php';

try {
    //データベースの接続を確立
    $db = getDb();
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO member_table(name, password) VALUES(:name, :password)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $_POST['name_signUp']);
    $stt->bindValue(':password', $_POST['password_signUp']);
    //INSERT命令を実行
    $stt->execute();
    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessege()}");
}
    //処理後は入力フォームにリダイレクト
header('Location: http://localhost/tech-aca5/board2/topPage.php');
?>