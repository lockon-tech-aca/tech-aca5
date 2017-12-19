<?php
$dsn = 'mysql:dbname = board1_db; host=127.0.0.1';
$usr = 'root';

try {
    $db = new  PDO($dsn, $usr);
    print '接続に成功しました。';
    $db = NULL;
} catch (PDOExcepttion $e) {
    die("接続エラー:{$e ->getMessage()}");
}