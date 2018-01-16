<?php

require_once './smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty -> template_dir = 'templates/';
$smarty -> compile_dir = 'templates_c/';


require('db_connection.php');

if(isset($_POST['update'])){

    try{

        $post = $pdo->prepare('UPDATE post_table set contents=:contents where id = :id');
        $post -> bindValue(':id' ,(int) $_POST['id'], PDO::PARAM_INT);
        $post -> bindValue(':contents' ,$_POST['contents']);
        $post -> execute();
        header('Location: ./show.php');
        exit;

    } catch ( PDOException $e ) {
        print "エラー:{$e->getMessage()}";
    }

}elseif (isset($_POST['delete'])){

    try{

        $post = $pdo->prepare('DELETE FROM post_table where id = :id');
        $post -> bindValue(':id' ,(int) $_POST['id'], PDO::PARAM_INT);
        $post -> execute();
        header('Location: ./show.php');
        exit;

    } catch ( PDOException $e ) {
        print "エラー:{$e->getMessage()}";
    }

}else{

    try{

        $post = $pdo->prepare('SELECT contents FROM post_table where id = :id');
        $post -> bindValue(':id' ,(int) $_POST['id'], PDO::PARAM_INT);
        $post -> execute();
        $contents = $post -> fetch();

    } catch ( PDOException $e ) {
        print "エラー:{$e->getMessage()}";
    }
    $smarty->assign('id', $_POST['id']);
    $smarty->assign('contents', $contents);
}

$smarty->display('post_update.html');