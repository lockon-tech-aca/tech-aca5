<?php
require_once('common.php');
require_once('dbConnection.php');

session_start();
$errorMessage = "";

$my_user_name = $_SESSION["NAME"];
$my_user_id = $_SESSION["USER_ID"];

$pdo = dbConnection("board3_db");

require_once('insert_contents.php');
require_once('show_contents.php');

$smarty->display('board2_index.tpl');
