<?php
require_once '../Dbmanagerforselfphp.php';
try {
    $db = getDb();
    print "success";
    $db = NULL;
}catch(PDOExeception $e){
    die("接続エラー:{$e ->getMessage()}");
}
