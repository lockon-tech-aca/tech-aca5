<?php
require_once'../Dbmanager.php';

try{

    $db=getDb();

    $stt = $db->prepare('INSERT INTO post_table (id, name, content) VALUES (:id, :name, :content)');

    $stt->bindValue(':id', $_POST['id']);
    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':content',$_POST['content']);

    //var_dump($stt);

    $stt->execute();

//    var_dump($stt->rowCount());
    $db = NULL;
    //  $stt->commit();
    //  header('Location: ./insert_form.php');
    //die();
}catch(PDOException $e) {
    die("エラーメッセージ:{$e->getMessage()}");
}

header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/board1_form.php');