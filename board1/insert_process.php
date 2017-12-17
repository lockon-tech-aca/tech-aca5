<?php
require_once 'connect.php';

try {
    $db = getDb();
    $stt = $db->prepare('INSERT INTO post_table(name,contents) VALUES(:name,:contents)');
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    $stt->execute();
    $db = NULL;
}catch (PDOException $e) {
    die("エラーメッセージ:{$e->getMessage()}");
}
header('Location: http://' . $_SERVER['HTTP_HOST']
    . dirname($_SERVER['PHP_SELF']) . '/insert_form.php');

?>