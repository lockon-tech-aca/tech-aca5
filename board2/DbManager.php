<?php
function getDb(){
    $dsn = 'mysql:dbname=board2_db; host=localhost';
    $usr = 'root';
    $passwd = '';

    try{
        //データベースへの接続を確立
        $db = new PDO($dsn, $usr, $passwd);
        //データベース接続時に使用する文字コードをutf8に設定
        $db->exec('SET NAMES utf8');
    }catch (PDOException $e) {
        die("接続エラー:{$e->getMessage()}");
    }
    return $db;
}
?>