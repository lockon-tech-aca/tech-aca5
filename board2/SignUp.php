<?php
require  'password.php';

session_start();

$db['host'] ="localhost";
$db['user']="root";
$db['pass']="root";
$db['dbname']="board2_db";


$errorMessage="";
$signUpMessage="";


if(empty($_POST["signUP"])){
    $errorMessage = 'ユーザーIDが未入力です。';

}