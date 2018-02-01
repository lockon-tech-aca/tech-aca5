<?php

require_once './vendor/autoload.php';

$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';

//エラーメッセージを初期化
$s->assign('error_message','');
//完了メッセージを初期化
$s->assign('action','');
//再実行メッセージを定義
$s->assign('reaction','投稿編集');

if (empty($_POST['contents'])) {
    $s->assign('error_message',"コメントが入力されていません。<br>");
    $s->display('error_message.tpl');
}
else if(mb_strlen($_POST['contents']) > 80){
    $s->assign('error_message',"コメントは80文字以内で入力してください。<br>");
    $s->display('error_message.tpl');
}
else {
    require_once 'DbManager.php';
    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        $contents = $_POST['contents'];
        $id = $_POST['id'];
        $stt = $db->prepare('UPDATE post_table SET contents =? WHERE id = ?');
        $stt->bindValue(1, $contents, PDO::PARAM_STR);
        $stt->bindValue(2, $id, PDO::PARAM_INT);
        $stt->execute();
        $s->assign('action','投稿編集');
        $s->display('complete.tpl');
        $db = NULL;

    } catch (PDOException $e) {
        die("接続エラー:{$e->getMessage()}");
    }
}
?>