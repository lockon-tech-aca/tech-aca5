<?php
function getDb()
{
    $dsn = 'mysql:dbname=board1_ab; host=127.0.0.1';
    $user = 'root';
    $passwd = '';

    try {
        //データベースへの接続を確立
        $db = new PDO($dsn, $user, $passwd);
        //データベース接続時に使用する文字コードをutf8に設定
        $db->exec('SET NAMES utf8');

        print '接続に成功しました。';
    } catch (PDOException $e) {
        die("接続エラー:{$e->getMessage()}");
    }
    return $db;
}
?>


