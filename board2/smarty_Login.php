<?php
require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';
$s->display('smarty_Login.tpl');
?>