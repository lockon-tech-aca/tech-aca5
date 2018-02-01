<?php
try {
    $pdo=new PDO('mysql:host=localhost;dbname=board1_db;charset=utf8','root', '');
} catch ( PDOException $e ) {
    print "接続エラー:{$e->getMessage()}";
}