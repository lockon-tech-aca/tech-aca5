<?php
require_once 'DbManager.php';
require_once 'Encode.php';

session_start();
$_SESSION["name_l"] = $_POST["name_l"];
$_SESSION["password_l"] = $_POST["password_l"];

try{
    $db=getDb();
    $a = $db->prepare('SELECT * FROM member_table WHERE name = ? AND password = ?');
    $name=$_POST['name_login'];
    $password=$_POST['password_login'];
    $a->bindValue(1, $name, PDO::PARAM_STR);
    $a->bindValue(2, $password, PDO::PARAM_STR);
    $b= $a->execute();

    if($b){
        header( "location: afterLogin.php" );
    }
}catch(PDOException $e){
    die();
}