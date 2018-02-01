<?php
require_once './DBManager.php';

try {
    $db = getDb();

    $stt = $db->prepare
    ('INSERT INTO post_table(name,contents) VALUES(:name, :contents)');


    $stt->bindValue(':name', $_POST['name']);
    $stt->bindValue(':contents', $_POST['contents']);
    $stt->execute();
    $db = NULL;
} catch(PODException $e) {
    die("接続エラー：{$e->getMessage()}");
}
    header('Location: http://'.$_SERVER['HTTP_HOST']
    .dirname($_SERVER['PHP_SELF']).'/result.php');

//    var_dump('Location: http://'.$_SERVER['HTTP_HOST']
//        .dirname($_SERVER['PHP_SELF']).'/insert_form.php');


?>
