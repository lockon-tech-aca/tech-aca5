<?php
require_once './DbManager.php';

try {
    //データベースへの接続を確立
    $db = getDb();
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO post_table(id, name, contents) VALUES(:id, :name, :contents)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    //INSERT命令を実行
    $stt->execute();
    $db = NULL;
}catch(PDOException $e) {
    die("エラーメッセージ:{$e->getMessage()}");
}

//処理後は入力フォームにリダイレクト
header('Location: http://'.$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF']).'/insert_form.php');


