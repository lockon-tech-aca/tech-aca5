<?php

session_start();

require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';

//メッセージを初期化
$s->assign('message','');
//完了メッセージを初期化
$s->assign('action','ログアウト');
//再実行メッセージを定義
$s->assign('reaction','ログイン');

if(isset($_SESSION['ID'])){
    $s->assign('message','ログアウトしました。');
}
else {
    $s->assign('message','セッションがタイムアウトしました。');
}

// セッションの変数のクリア
$_SESSION = array();

//セッションを破棄
session_destroy();

$s->display('complete.tpl');
?>
