<?php
function getDb(){
    $dsn = 'mysql:dbname=board1_db;host=127.0.0.1';
    $usr = 'root';
    $passwd = '';

    try {
        $db = new PDO($dsn, $usr, $passwd);
        $db->exec('SET NAMES utf8');
    } catch (PDOException $e) {
        die("接続エラー:{$e->getMessage()}");
    }
    return $db;
}