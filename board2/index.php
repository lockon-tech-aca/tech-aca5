<?php

// smartyの設定ファイル読み込み
require_once(realpath(__DIR__) . "/smarty/Autoloader.php");
Smarty_Autoloader::register();

$name = 'honda';
$age=19;

$smarty = new Smarty();
$smarty->assign('name', $name);
$smarty->assign('age', $age);
$smarty->display('index.tpl');