<?php
require_once 'DbManager.php';
require_once 'Encode.php';

session_start();
$_SESSION["name"] = $_POST["name"];
$_SESSION["password"] = $_POST["password"];

try{
    $db=getDb();
    $a = $db->prepare('SELECT * FROM member_table WHERE name = ? AND password = ?');
    $name=$_POST['name'];
    $password=$_POST['password'];
    $a->bindValue(1, $name, PDO::PARAM_STR);
    $a->bindValue(2, $password, PDO::PARAM_STR);
    $b= $a->execute();

    if($b){
        header( "location: http://www.yomiuri.co.jp/" );
    }
}catch(PDOException $e){
    die();
}