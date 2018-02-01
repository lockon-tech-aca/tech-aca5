<?php

require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';
//完了メッセージを初期化
$s->assign('action','');
    require_once 'DbManager.php';

    try {
        $db = getDb();
        $db->exec('SET NAMES utf8');
        //変数にポストしてきた値を代入
        $id = $_POST['id'];

        $stt = $db->prepare('DELETE FROM post_table WHERE id = ?');

        $stt->bindValue(1,$id,PDO::PARAM_INT);

        $stt->execute();

        //完了メッセージに代入
        $s->assign('action','投稿削除');
        $s->display('complete.tpl');
    }
    catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }
$db = NULL;
