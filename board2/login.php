<?php
require_once 'DbManager.php';
require_once 'Encode.php';

session_start();
$_SESSION["name_login"] = $_POST["name_login"];
$_SESSION["password_login"] = $_POST["password_login"];
$name=$_POST['name_login'];
$password=$_POST['password_login'];

try{
    $db=getDb();
    $stmt = $db->query("SELECT id FROM member_table WHERE name = '$name' AND password = '$password'");
    $user_id = $stmt->fetchColumn();
    $_SESSION["user_id"] = $user_id;

    if($user_id){
        header( "location: afterLogin.php" );
    }else{
        header( "location: login_false.php" );
    }
}catch(PDOException $e){
    die();
}
?>