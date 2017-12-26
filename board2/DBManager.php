<?php
/**
 * Created by PhpStorm.
 * User: Meee
 * Date: 2017/12/07
 * Time: 18:04
 */
function getDb()
{
    $dsn = 'mysql:dbname=board1_db; host=127.0.0.1';
    $usr = 'root';
    $passwd = 'root';
    try {
        $db = new PDO($dsn, $usr, $passwd);
//    print '接続に成功しました';
//        $db = NULL;
        $db->exec('SET NAMES utf 8');
    } catch (PODException $e) {
        die("接続エラー：{$e->getMessage()}");
    }
    return $db;
}

?>