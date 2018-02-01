<?php

require_once './vendor/autoload.php';

$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';
//ポストしてきたデータを変数に格納
$id = $_POST['id'];
$contents = $_POST['contents'];

$s->assign("id","$id");
$s->assign("contents","$contents");

$s->display('smarty_edit_comment.tpl');
?>


