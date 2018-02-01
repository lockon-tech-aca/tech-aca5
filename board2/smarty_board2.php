<?php
//セッションの開始
session_start();


require_once './vendor/autoload.php';
$s = new Smarty();
$s->template_dir = './templates/';
$s->compile_dir = './templates_c/';

if (isset($_SESSION['NAME'])) {
    $name = $_SESSION['NAME'];
    $s->assign("name",$_SESSION['NAME']);
}

require_once 'DbManager.php';
try {
    //変数にセッションで保持された値を代入
    $name = $_SESSION['NAME'];
    $user_id = $_SESSION['ID'];
    $db = getDb();
    $result = $db->prepare('SELECT * FROM post_table WHERE user_id = ?');
    $result->bindValue(1,$user_id,PDO::PARAM_INT);
    $result->execute();
//    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    //$rowを""でくくるとデータが移行しない。
    $s->assign("data",$row);
    $s->display('smarty_board2.tpl');

}catch(PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}


?>
