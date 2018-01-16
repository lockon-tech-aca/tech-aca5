<?php
require_once 'DbManager.php';
require_once 'Encode.php';

session_start();
$_SESSION["name_login"] = $_POST["name_login"];
$_SESSION["password_login"] = $_POST["password_login"];

try{
    $db=getDb();
    $a = $db->prepare('SELECT * FROM member_table WHERE name = ? AND password = ?');
    $c = $db->prepare('SELECT id FROM member_table WHERE name = ?');
    $name=$_POST['name_login'];
    $password=$_POST['password_login'];
    $a->bindValue(1, $name, PDO::PARAM_STR);
    $a->bindValue(2, $password, PDO::PARAM_STR);
    $c->bindValue(1, $_SESSION["name_login"], PDO::PARAM_STR);
    $b= $a->execute();
    $_SESSION["user_id"] = $c->execute();

    if($b){
        header( "location: afterLogin.php" );
    }
}catch(PDOException $e){
    die();
}
?>