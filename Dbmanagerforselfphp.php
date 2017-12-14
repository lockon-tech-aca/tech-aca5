<?php
function getDb(){
    $dsn = 'mysql:dbname = self; host=127.0.0.1';
    $usr = 'root';

    try{
        $db = new PDO($dsn,$usr);
        $db->exec('SET NAMES utf8');
    }catch(PDOException $e){
        die("接続エラー:{$e->getMessage()}");
    }
    return $db;
}
