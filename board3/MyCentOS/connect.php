<?php
$dsn = 'mysql:dbname=board2_db; host=127.0.0.1; charaset=utf8';
$usr = 'root';
$passwd = '11111';

try {
    $db = new PDO($dsn, $usr, $passwd);
    print'接続に成功しました。';
}catch(PDOException $e){
    print"接続エラー : {$e->getMessage()}";
}finally{
    $db = null;
}