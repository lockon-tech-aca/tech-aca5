<?php

$db_user = "root";  
$db_pass = "";   
$db_host = "127.0.0.1";   
$db_name = "board1_db";  
?>
 
<?php
 

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
 
/* データベース接続 */
try{
  $pdo = new PDO($dsn, $db_user, $db_pass);

  //sql実行時のエラーを補足
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}catch(PDOException $Exception){
  /* エラーメッセージ */
  die('接続エラー:'.$Exception->getMessage());
}
?>