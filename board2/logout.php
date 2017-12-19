<?php
require_once('common.php');
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();

$smarty->assign('errorMessage', $errorMessage);

$smarty->display('logout.tpl');